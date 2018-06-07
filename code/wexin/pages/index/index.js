//index.js
//获取应用实例
const app = getApp()

Page({
  data: {
    userInfo: {
      // avatar:'../images/avatar.svg',
      name: '我是王宝强',
      money: '000.01',
      avatar:'../../images/logo.png',
    },
    adList: [
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
      {adUrl: '../../images/ad_001.png', adTimer: 10},
    ]
  },
  //事件处理函数
  bindViewTap: function() {
    wx.navigateTo({
      url: '../logs/logs'
    })
  },
  onLoad: function () {
    if (app.globalData.userInfo) {
      this.setData({
      })
    } else if (this.data.canIUse){
      // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
      // 所以此处加入 callback 以防止这种情况
      app.userInfoReadyCallback = res => {
        this.setData({
        })
      }
    } else {
      // 在没有 open-type=getUserInfo 版本的兼容处理
      wx.getUserInfo({
        success: res => {
          this.setData({
          })
        }
      })
    }
  },
  getUserInfo: function(e) {
    this.setData({
    })
  }
})
