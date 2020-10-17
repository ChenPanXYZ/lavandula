//@code_start
$(function(){
const eventListenerOptionsSupported = () => {
  let supported = false;

  try {
    const opts = Object.defineProperty({}, 'passive', {
      get() {
        supported = true;
      }
    });

    window.addEventListener('test', null, opts);
    window.removeEventListener('test', null, opts);
  } catch (e) {}

  return supported;
}

const defaultOptions = {
  passive: false,
  capture: false
};
const supportedPassiveTypes = [
  'scroll', 'wheel',
  'touchstart', 'touchmove', 'touchenter', 'touchend', 'touchleave',
  'mouseout', 'mouseleave', 'mouseup', 'mousedown', 'mousemove', 'mouseenter', 'mousewheel', 'mouseover'
];
const getDefaultPassiveOption = (passive, eventName) => {
  if (passive !== undefined) return passive;

  return supportedPassiveTypes.indexOf(eventName) === -1 ? false : defaultOptions.passive;
};

const getWritableOptions = (options) => {
  const passiveDescriptor = Object.getOwnPropertyDescriptor(options, 'passive');

  return passiveDescriptor && passiveDescriptor.writable !== true && passiveDescriptor.set === undefined
    ? Object.assign({}, options)
    : options;
};

const overwriteAddEvent = (superMethod) => {
  EventTarget.prototype.addEventListener = function (type, listener, options) {
    const usesListenerOptions = typeof options === 'object' && options !== null;
    const useCapture          = usesListenerOptions ? options.capture : options;

    options         = usesListenerOptions ? getWritableOptions(options) : {};
    options.passive = getDefaultPassiveOption(options.passive, type);
    options.capture = useCapture === undefined ? defaultOptions.capture : useCapture;

    superMethod.call(this, type, listener, options);
  };

  EventTarget.prototype.addEventListener._original = superMethod;
};

const supportsPassive = eventListenerOptionsSupported();

if (supportsPassive) {
  const addEvent = EventTarget.prototype.addEventListener;
  overwriteAddEvent(addEvent);
}

$('#world-map-markers').vectorMap({
  map: 'world_mill',
  scaleColors: ['#C8EEFF', '#0071A4'],
  normalizeFunction: 'polynomial',
  hoverOpacity: 0.7,
  hoverColor: true,
  
 zoomButtons: false,
 regionStyle: {
     hover: {
         "fill-opacity": 1
     }
 },
 onRegionTipShow: function (e, label, code) {
  let names = {
    // "en": { "TW": "Taiwan, Republic of China", "CN": "People's Republic of China"},
    // "zh-CN": { "TW": "中国台湾", "CN": "中国"},
    // "zh-TW": { "TW": "中華民國", "CN": "中國大陸"},
  }

  label.html(names[document.documentElement.lang][code]);
     // e.preventDefault();
 },
  markerStyle: {
    initial: {
      fill: '#B68E55',
      stroke: '#B68E55'
    }
  },
  backgroundColor: '#4D5139',
  markers: [
    {latLng: [26.07447, 119.29648], name: 'Fuzhou'},
    {latLng: [22.19874, 113.54387], name: 'Macao'},
    {latLng: [25.03296, 121.56541], name: 'Taipei City'},
    {latLng: [22.62727, 120.30143], name: 'Kaohsiung City'},
    {latLng: [25.01698, 121.46278], name: 'New Taipei City'},
    {latLng: [23.48007, 120.44911], name: 'Chiayi City'},
    {latLng: [24.14773, 120.67364], name: 'Taichung City'},
    {latLng: [24.47983, 118.08942], name: 'Xiamen'},
    {latLng: [26.66561, 119.54793], name: 'Ningde'},
    {latLng: [24.51302, 117.64709], name: 'Zhangzhou'},
    {latLng: [26.64177, 118.1777], name: 'Nanping'},
    {latLng: [26.2634, 117.63867], name: 'Sanming'},
    {latLng: [30.03719, 121.15463], name: 'Yuyao'},
    {latLng: [30.27408, 120.15507], name: 'Hangzhou'},
    {latLng: [32.06025, 118.79687], name: 'Nanjing'},
    {latLng: [31.49116, 120.31191], name: 'Wuxi'},
    {latLng: [31.29897, 120.58528], name: 'Suzhou'},
    {latLng: [31.23041, 121.4737], name: 'Shanghai'},
    {latLng: [29.55936, 115.99334], name: 'Lushan Mountain'},
    {latLng: [39.90419, 116.40739], name: 'Beijing'},
    {latLng: [39.34335, 117.36164], name: 'Tianjin'},
    {latLng: [41.80569, 123.43147], name: 'Shenyang'},
    {latLng: [40.00078, 124.35445], name: 'Dandong'},
    {latLng: [22.54309, 114.05786], name: 'Shenzhen'},
    {latLng: [22.3193, 114.16936], name: 'Hong Kong'},
    {latLng: [37.56653, 126.97796], name: 'Seoul'},
    {latLng: [33.49962, 126.53118], name: 'Jeju-si'},
    {latLng: [43.65322, -79.38318], name: 'Toronto'},
    {latLng: [45, -81.33333], name: 'Bruce Peninsula'},
    {latLng: [45.80377, 126.53496], name: 'Harbin'},
    {latLng: [43.8971, -78.8658], name: 'Oshawa'},
    {latLng: [39.8007, -76.9830], name: 'Hanover'},
    {latLng: [39.9526, -75.1652], name: 'Philadelphia'},
    {latLng: [38.9072, -77.0369], name: 'Washington, D.C.'},
    {latLng: [40.7128, -74.0060], name: 'New York City'}

  ]
});
});
//@code_end