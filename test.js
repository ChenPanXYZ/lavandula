let log = console.log
function getDayGap(date1, date2) {
    let Difference_In_Time = date2.getTime() - date1.getTime()
    let dayGap = Difference_In_Time / (1000 * 3600 * 24)
    return dayGap
}

function formatDate(date) {
    var year = date.getFullYear().toString();
    var month = (date.getMonth() + 101).toString().substring(1);
    var day = (date.getDate() + 100).toString().substring(1);
    return year + "年" + month + "月" + day + "日";
}

let hostings = [
    {
        "provider": "阿里云",
        "location": "大陆地区山东省",
        "startDate": new Date("2016-11-05"),
        "endDate": new Date("2017-05-04"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "主机公园",
        "location": "香港特别行政区",
        "startDate": new Date("2017-05-04"),
        "endDate": new Date("2017-05-16"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "恒创主机",
        "location": "香港特别行政区",
        "startDate": new Date("2017-05-16"),
        "endDate": new Date("2017-05-18"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "百度云开放",
        "location": "香港特别行政区",
        "startDate": new Date("2017-05-18"),
        "endDate": new Date("2017-05-21"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "恒创主机",
        "location": "香港特别行政区",
        "startDate": new Date("2017-05-21"),
        "endDate": new Date("2017-06-08"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "蓝色主机",
        "location": "香港特别行政区",
        "startDate": new Date("2017-06-08"),
        "endDate": new Date("2017-07-13"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "GoDaddy",
        "location": "美国亚利桑那州",
        "startDate": new Date("2017-07-13"),
        "endDate": new Date("2017-11-15"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "阿里云",
        "location": "香港特别行政区",
        "startDate": new Date("2017-11-15"),
        "endDate": new Date("2017-11-25"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "GoDaddy",
        "location": "美国亚利桑那州",
        "startDate": new Date("2017-11-25"),
        "endDate": new Date("2017-12-09"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "腾讯云",
        "location": "香港特别行政区",
        "startDate": new Date("2017-12-09"),
        "endDate": new Date("2018-03-19"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "阿里云",
        "location": "大陆地区广东省",
        "startDate": new Date("2018-03-19"),
        "endDate": new Date("2018-07-03"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "腾讯云",
        "location": "大陆地区上海市",
        "startDate": new Date("2018-07-03"),
        "endDate": new Date("2018-11-09"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "腾讯云",
        "location": "香港特别行政区",
        "startDate": new Date("2018-11-09"),
        "endDate": new Date("2018-11-16"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "Google Cloud",
        "location": "台湾地区彰化县",
        "startDate": new Date("2018-11-16"),
        "endDate": new Date("2019-01-20"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "腾讯云",
        "location": "香港特别行政区",
        "startDate": new Date("2019-01-20"),
        "endDate": new Date("2019-10-21"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "DigitalOcean",
        "location": "加拿大安大略省",
        "startDate": new Date("2019-10-21"),
        "endDate": new Date("2019-12-13"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "Vultr",
        "location": "美国新泽西州",
        "startDate": new Date("2019-12-13"),
        "endDate": new Date("2020-04-24"),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init(),
    {
        "provider": "Hetzner",
        "location": "德国巴伐利亚州",
        "startDate": new Date("2020-04-24"),
        "endDate": new Date(),
        init: function () {
            this.duration = getDayGap(this.startDate, this.endDate)
            return this
        }
    }.init()
]
log(hostings)



let providers = []
for(let i = 0; i < hostings.length; i++) {
    let hosting = hostings[i]
    if(hosting.provider in providers) {
        providers[hosting.provider].durations.push({startDate: hosting.startDate, endDate: hosting.endDate})
        providers[hosting.provider].days += hosting.duration
    }
    else {
        providers[hosting.provider] = {provider: hosting.provider, durations: [{startDate: hosting.startDate, endDate: hosting.endDate}], days: hosting.duration}
    }
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
    // let providerElement = document.createElement('li')
    providersByDays.push({provider: provider, data: data})
    //log(providerStringGenerator(provider, data))
    // hostingListByProvider.appendChild(providerElement)
}


providersByDays = providersByDays.sort(function(a, b){
    return b.data.days - a.data.days
})


for(let i = 0; i < providersByDays.length; i++) {
    log(providerStringGenerator(providersByDays[i].provider, providersByDays[i].data))
}