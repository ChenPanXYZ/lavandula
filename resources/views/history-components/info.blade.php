<section class ="main-section content" id="history">
    <div id="hisotry-info">
        <?php if ($languageCode == "zh-CN") {?>
        <h3 class="has-text-align-center">主机变迁史</h3>
        <p>以单次连续使用服务器/虚拟主机时间排列：</p>
        <ol id="hosting-list-by-duration"></ol>
        <p>以开始使用日期排列：</p>
        <div id="timeline"></div>
        <ol id="hosting-list-by-start-date"></ol>
        <p>以服务器/虚拟主机提供商使用时间排列：</p>
        <ol id="hosting-list-by-provider"></ol>
        <p>以服务器/虚拟主机所在地排列：</p>
        <div id="locationTimeline"></div>
        <ol id="hosting-list-by-location"></ol>
        <p id = "icp-number">中国大陆工信部备案号：闽ICP备15010588号</p>
        <?php }
        else if ($languageCode == "zh-TW") {?>
            <h3 class="has-text-align-center">伺服器播遷史</h3>
            <p>以單次連續使用伺服器/虛擬主機時間排列：</p>
            <ol id="hosting-list-by-duration"></ol>
            <p>以開始使用日期排列：</p>
            <div id="timeline"></div>
            <ol id="hosting-list-by-start-date"></ol>
            <p>以伺服器/虛擬主機提供商使用時間排列：</p>
            <ol id="hosting-list-by-provider"></ol>
            <p>以伺服器/虛擬主機所在排列：</p>
            <div id="locationTimeline"></div>
            <ol id="hosting-list-by-location"></ol>
        <?php }
        else {?>
            <h3 class="has-text-align-center">Server History</h3>
            <p>Sorted by Single Service Time</p>
            <ol id="hosting-list-by-duration"></ol>
            <p>Sorted by Service Start Date</p>
            <div id="timeline"></div>
            <ol id="hosting-list-by-start-date"></ol>
            <p>Sorted by Service Provider</p>
            <ol id="hosting-list-by-provider"></ol>
            <p>Sorted by Location</p>
            <div id="locationTimeline"></div>
            <ol id="hosting-list-by-location"></ol>
        <?php }; ?>
        
    </div>
</section>

<script>
let hostingListByStartDate = document.getElementById('hosting-list-by-start-date')
let hostingListByDuration = document.getElementById('hosting-list-by-duration')
let hostingListByProvider = document.getElementById('hosting-list-by-provider')
let hostingListByLocation  = document.getElementById('hosting-list-by-location')
<?php if ($languageCode == "zh-CN") { ?>
let hostings = [
    {
        "provider": "阿里云",
        "location": "大陆地区山东省",
        "startDate": "2016-11-05",
        "endDate": "2017-05-04",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "主机公园",
        "location": "香港地区",
        "startDate": "2017-05-04",
        "endDate": "2017-05-16",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "恒创主机",
        "location": "香港地区",
        "startDate": "2017-05-16",
        "endDate": "2017-05-18",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "百度云开放",
        "location": "香港地区",
        "startDate": "2017-05-18",
        "endDate": "2017-05-21",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "恒创主机",
        "location": "香港地区",
        "startDate": "2017-05-21",
        "endDate": "2017-06-08",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "蓝色主机",
        "location": "香港地区",
        "startDate": "2017-06-08",
        "endDate": "2017-07-13",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "GoDaddy",
        "location": "美国亚利桑那州",
        "startDate": "2017-07-13",
        "endDate": "2017-11-15",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "阿里云",
        "location": "香港地区",
        "startDate": "2017-11-15",
        "endDate": "2017-11-25",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "GoDaddy",
        "location": "美国亚利桑那州",
        "startDate": "2017-11-25",
        "endDate": "2017-12-09",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "腾讯云",
        "location": "香港地区",
        "startDate": "2017-12-09",
        "endDate": "2018-03-19",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "阿里云",
        "location": "大陆地区广东省",
        "startDate": "2018-03-19",
        "endDate": "2018-07-03",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "腾讯云",
        "location": "大陆地区上海市",
        "startDate": "2018-07-03",
        "endDate": "2018-11-09",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "腾讯云",
        "location": "香港地区",
        "startDate": "2018-11-09",
        "endDate": "2018-11-16",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "Google Cloud",
        "location": "台湾地区彰化县",
        "startDate": "2018-11-16",
        "endDate": "2019-01-20",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "腾讯云",
        "location": "香港地区",
        "startDate": "2019-01-20",
        "endDate": "2019-10-21",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "DigitalOcean",
        "location": "加拿大安大略省",
        "startDate": "2019-10-21",
        "endDate": "2019-12-13",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "Vultr",
        "location": "美国新泽西州",
        "startDate": "2019-12-13",
        "endDate": "2020-04-24",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "Hetzner",
        "location": "德国巴伐利亚州",
        "startDate": "2020-04-24",
        "endDate": "2020-04-30",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
        "provider": "Vultr",
        "location": "美国新泽西州",
        "startDate": "2020-04-30",
        "endDate": "2020-05-06",
        init: function () {
            this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
            return this
        }
    }.init(),
    {
            "provider": "Hetzner",
            "location": "德国巴伐利亚州",
            "startDate": "2020-05-06",
            "endDate": "2020-11-22",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "DigitalOcean",
            "location": "美国加利福利亚州",
            "startDate": "2020-11-22",
            init: function () {
                this.duration = Math.floor(getDayGap(new Date(this.startDate), new Date()))
                return this
            }
        }.init()
]
<?php }
else if ($languageCode == "zh-TW") {?>
    let hostings = [
        {
            "provider": "阿里雲",
            "location": "大陸地區山東省",
            "startDate": "2016-11-05",
            "endDate": "2017-05-04",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "主機公園",
            "location": "香港地區",
            "startDate": "2017-05-04",
            "endDate": "2017-05-16",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "恆創主機",
            "location": "香港地區",
            "startDate": "2017-05-16",
            "endDate": "2017-05-18",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "百度雲開放",
            "location": "香港地區",
            "startDate": "2017-05-18",
            "endDate": "2017-05-21",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "恆創主機",
            "location": "香港地區",
            "startDate": "2017-05-21",
            "endDate": "2017-06-08",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "藍色主機",
            "location": "香港地區",
            "startDate": "2017-06-08",
            "endDate": "2017-07-13",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "GoDaddy",
            "location": "美國亞利桑那州",
            "startDate": "2017-07-13",
            "endDate": "2017-11-15",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "阿里雲",
            "location": "香港地區",
            "startDate": "2017-11-15",
            "endDate": "2017-11-25",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "GoDaddy",
            "location": "美國亞利桑那州",
            "startDate": "2017-11-25",
            "endDate": "2017-12-09",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "騰訊雲",
            "location": "香港地區",
            "startDate": "2017-12-09",
            "endDate": "2018-03-19",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "阿里雲",
            "location": "大陸地區廣東省",
            "startDate": "2018-03-19",
            "endDate": "2018-07-03",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "騰訊雲",
            "location": "大陸地區上海市",
            "startDate": "2018-07-03",
            "endDate": "2018-11-09",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "騰訊雲",
            "location": "香港地區",
            "startDate": "2018-11-09",
            "endDate": "2018-11-16",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Google Cloud",
            "location": "台灣地區彰化縣",
            "startDate": "2018-11-16",
            "endDate": "2019-01-20",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "騰訊雲",
            "location": "香港地區",
            "startDate": "2019-01-20",
            "endDate": "2019-10-21",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "DigitalOcean",
            "location": "加拿大安大略省",
            "startDate": "2019-10-21",
            "endDate": "2019-12-13",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Vultr",
            "location": "美國新澤西州",
            "startDate": "2019-12-13",
            "endDate": "2020-04-24",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Hetzner",
            "location": "德國巴伐利亞州",
            "startDate": "2020-04-24",
            "endDate": "2020-04-30",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Vultr",
            "location": "美國新澤西州",
            "startDate": "2020-04-30",
            "endDate": "2020-05-06",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Hetzner",
            "location": "德國巴伐利亞州",
            "startDate": "2020-05-06",
            "endDate": "2020-11-22",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "DigitalOcean",
            "location": "美國加利福利亞州",
            "startDate": "2020-11-22",
            init: function () {
                this.duration = Math.floor(getDayGap(new Date(this.startDate), new Date()))
                return this
            }
        }.init()
    ]
<?php }
        else {?>
    let hostings = [
        {
            "provider": "Alibaba Cloud",
            "location": "Shandong, Mainland China",
            "startDate": "2016-11-05",
            "endDate": "2017-05-04",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "HostPark",
            "location": "Hong Kong",
            "startDate": "2017-05-04",
            "endDate": "2017-05-16",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Heng Host",
            "location": "Hong Kong",
            "startDate": "2017-05-16",
            "endDate": "2017-05-18",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Baidu Cloud",
            "location": "Hong Kong",
            "startDate": "2017-05-18",
            "endDate": "2017-05-21",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Heng Host",
            "location": "Hong Kong",
            "startDate": "2017-05-21",
            "endDate": "2017-06-08",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Bluehost",
            "location": "Hong Kong",
            "startDate": "2017-06-08",
            "endDate": "2017-07-13",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "GoDaddy",
            "location": "Arizona, US",
            "startDate": "2017-07-13",
            "endDate": "2017-11-15",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Alibaba Cloud",
            "location": "Hong Kong",
            "startDate": "2017-11-15",
            "endDate": "2017-11-25",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "GoDaddy",
            "location": "Arizona, US",
            "startDate": "2017-11-25",
            "endDate": "2017-12-09",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Tencent Cloud",
            "location": "Hong Kong",
            "startDate": "2017-12-09",
            "endDate": "2018-03-19",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Alibaba Cloud",
            "location": "Guangdong, Mainland China",
            "startDate": "2018-03-19",
            "endDate": "2018-07-03",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Tencent Cloud",
            "location": "Shanghai, Mainland China",
            "startDate": "2018-07-03",
            "endDate": "2018-11-09",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Tencent Cloud",
            "location": "Hong Kong",
            "startDate": "2018-11-09",
            "endDate": "2018-11-16",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Google Cloud",
            "location": "Changhua, Taiwan",
            "startDate": "2018-11-16",
            "endDate": "2019-01-20",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Tencent Cloud",
            "location": "Hong Kong",
            "startDate": "2019-01-20",
            "endDate": "2019-10-21",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "DigitalOcean",
            "location": "Ontario, Canada",
            "startDate": "2019-10-21",
            "endDate": "2019-12-13",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Vultr",
            "location": "New Jersey, US",
            "startDate": "2019-12-13",
            "endDate": "2020-04-24",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Hetzner",
            "location": "Bavaria, Germany",
            "startDate": "2020-04-24",
            "endDate": "2020-04-30",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Vultr",
            "location": "New Jersey, US",
            "startDate": "2020-04-30",
            "endDate": "2020-05-06",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "Hetzner",
            "location": "Bavaria, Germany",
            "startDate": "2020-05-06",
            "endDate": "2020-11-22",
            init: function () {
                this.duration = getDayGap(new Date(this.startDate), new Date(this.endDate))
                return this
            }
        }.init(),
        {
            "provider": "DigitalOcean",
            "location": "California, US",
            "startDate": "2020-11-22",
            init: function () {
                this.duration = Math.floor(getDayGap(new Date(this.startDate), new Date()))
                return this
            }
        }.init()
    ]
        <?php }; ?>
const colors = ["#4D5139", "#F17C67", "#554236", "#4E4F97", "#00896C", "#8E354A", "#947A6D", "#91AD70", "#6F3381", "#C1328E", "#C7802D", "#B55D4C", "#574C57", "#E16B8C", "#F9BF45", "#9B90C2", "#91B493", "#6E552F", "#C78550", "#336774"];
X=new Date("11/5/2016 14:57:02 GMT+0800");
Y=new Date();T=(Y.getTime()-X.getTime());
M=24*60*60*1000;a=T/M;A=Math.floor(a);
b=(a-A)*24;B=Math.floor(b);c=(b-B)*60;
C=Math.floor((b-B)*60);
D=Math.floor((c-C)*60);

function getDayGap(date1, date2) {
    let Difference_In_Time = date2.getTime() - date1.getTime()
    let dayGap = Difference_In_Time / (1000 * 3600 * 24)
    return dayGap
}
    
function hostingStringGenerator(hosting) {
    return hosting.provider + "（" + hosting.location + "）" + formatDate(hosting.startDate) + "——"　+ formatDate(hosting.endDate) + "（" + hosting.duration + "天）"
}
    
function formatDate(date) {
    const year = date.substr(0, 4)
    let month = date.substr(5, 2)
    if(month[0] === "0") {month = month[1]}
    let day = date.substr(8, 2)
    if(day[0] === "0") {day= day[1]}
    return year + "年" + month + "月" + day + "日";
}
    
let providers = []
for(let i = 0; i < hostings.length; i++) {
    let hosting = hostings[i]
    if(hosting.provider in providers) {
        providers[hosting.provider].durations.push({startDate: hosting.startDate, endDate: hosting.endDate})
        providers[hosting.provider].days += hosting.duration
        if(hosting.endDate === undefined) {
            providers[hosting.provider].current = true
        }
    }
    else {
        providers[hosting.provider] = {provider: hosting.provider, durations: [{startDate: hosting.startDate, endDate: hosting.endDate}], days: hosting.duration}
        if(hosting.endDate === undefined) {
            providers[hosting.provider].current = true
        }
    }
}
    
let totalDay = A + 1;
let hostingTimeline = document.getElementById('timeline');
for(let i = 0; i < hostings.length; i++) {
    let hosting = hostings[i]
    let hostingElement = document.createElement('li')
    if(hosting.endDate === undefined) {
        hostingElement.innerHTML = "<strong>" + hosting.provider + "（" + hosting.location + "）" + formatDate(hosting.startDate) + "——"　+ "今" + "（" + hosting.duration + "天）" + "</strong>"
    }
    else {
        hostingElement.textContent = hostingStringGenerator(hosting)
    }
    hostingListByStartDate.appendChild(hostingElement)

    let hostingTimeElement = document.createElement('div');
    hostingTimeElement.setAttribute('class', 'time');
    hostingTimeElement.style.width = hosting.duration / totalDay * 100 + "%";
    if(!hosting.endDate) hostingTimeElement.style.backgroundColor = "#66BAB7";
    else hostingTimeElement.style.backgroundColor = colors[i];
    hostingTimeline.appendChild(hostingTimeElement)
}
    
let hostingsByDuration = hostings.sort(function(a, b){
    return b.duration - a.duration
})
    
for(let i = 0; i < hostings.length; i++) {
    let hosting = hostings[i]
    let hostingElement = document.createElement('li')
    if(hosting.endDate === undefined) {
        hostingElement.innerHTML = "<strong>" + hosting.provider + "（" + hosting.location + "）" + formatDate(hosting.startDate) + "——"　+ "今" + "（" + hosting.duration + "天）" + "</strong>"
    }
    else {
        hostingElement.textContent = hostingStringGenerator(hosting)
    }
    hostingListByDuration.appendChild(hostingElement)
}
    
function providerStringGenerator(provider, data) {
    let result = ""
    result += provider + " "
    for(let i = 0; i < data.durations.length; i++) {
        let time = data.durations[i]
        if(i!=0) {
            result += "、"
        }
        result += formatDate(time.startDate) + "——" + formatDate(time.endDate)
    }
    result += "（" + data.days + "天）"


    return result
}
    
providersByDays = []

for(let [provider, data] of Object.entries(providers)) {
    providersByDays.push({provider: provider, data: data})
}
    
    
providersByDays = providersByDays.sort(function(a, b){
    return b.data.days - a.data.days
})
    
for(let i = 0; i < providersByDays.length; i++) {
    let providerElement = document.createElement('li')
    if(providersByDays[i].data.current) {
        let temp = document.createElement("STRONG");
        temp.innerHTML = providersByDays[i].provider + " "
        for(let k = 0; k < providersByDays[i].data.durations.length; k++) {
            let duration = providersByDays[i].data.durations[k]
            if(k != 0) {
                temp.innerHTML += "、" 
            }
            if(duration.endDate === undefined) {
                temp.innerHTML += formatDate(duration.startDate) + "——" + "今"
            }
            else {
                temp.innerHTML += formatDate(duration.startDate) + "——" + formatDate(duration.endDate)
            }
        }
        temp.innerHTML += "（" + providersByDays[i].data.days + "天）"
        providerElement.appendChild(temp)
    }
    else {
        providerElement.textContent = providerStringGenerator(providersByDays[i].provider, providersByDays[i].data)
    }
    hostingListByProvider.appendChild(providerElement)
}
    
let locations = []
for(let i = 0; i < hostings.length; i++) {
    let hosting = hostings[i]
    if(hosting.location in locations) {
        locations[hosting.location].days += hosting.duration
        if(hosting.endDate === undefined) {
            locations[hosting.location].current = true
        }
    }
    else {
        locations[hosting.location] = {days: hosting.duration}
        if(hosting.endDate === undefined) {
            locations[hosting.location].current = true
        }
    }
}
    
locationsByDays = []

for(let [location, data] of Object.entries(locations)) {
    // let providerElement = document.createElement('li')
    locationsByDays.push({location: location, data: data})
    //log(providerStringGenerator(provider, data))
    // hostingListByProvider.appendChild(providerElement)
}
    
    
locationsByDays = locationsByDays.sort(function(a, b){
    return b.data.days - a.data.days
})

let locationTimeline = document.getElementById("locationTimeline");
for(let i = 0; i < locationsByDays.length; i++) {
    let locationElement = document.createElement('li')
    if(locationsByDays[i].data.current) {
        let temp = document.createElement("STRONG");
        temp.innerHTML += locationsByDays[i].location
        temp.innerHTML += " " + locationsByDays[i].data.days + "天"
        locationElement.appendChild(temp)
    }
    else {
        locationElement.textContent = locationsByDays[i].location + " " + locationsByDays[i].data.days + "天"
    }
    hostingListByLocation.appendChild(locationElement);
    let locationTimeElement = document.createElement('div');
    locationTimeElement.setAttribute('class', 'locationTime');
    locationTimeElement.style.width = locationsByDays[i].data.days / totalDay * 100 + "%";
    if(locationsByDays[i].data.current) locationTimeElement.style.backgroundColor = "#66BAB7";
    else locationTimeElement.style.backgroundColor = colors[i];
    locationTimeline.appendChild(locationTimeElement)
}
</script>

<style>
#timeline, #locationTimeLine{
    font-size: 0px;
    margin: 20px 0 20px 0;
}
.time, .locationTime {
    height: 18px;
    display: inline-block;
    text-align: center;
}
#hisotry-info ol{
    font-size: 18px;
}
@media (min-width: 900px) {
    #hisotry-info ol{
        font-size: 20px;
    }
    .time, .locationTime {
        height: 20px;
    }
}
</style>