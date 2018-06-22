//index.js
//获取应用实例
const app = getApp()

// 1：普通用户 2：分销商 3：内容提供者 4：消费者
const USER_ROLE_NORMAL            = 1;
const USER_ROLE_DISTRIBUTORS      = 2;
const USER_ROLE_CONTENTPROVIDER   = 3;
const USER_ROLE_CONSUMERS         = 4;



Page({
  data: {
    userInfo: {
      name: '我是王宝强1',
      money: '102.01',
      avatar: '/images/logo.png',
      userRole: USER_ROLE_CONTENTPROVIDER
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
    ],
    earningsList: [
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
      {time: '2018年6月8日', earnings: '0.0001'},
    ],
    inviteEarningsList: [
      { time: '2018年6月8日', earnings: '0.0001', invitecode: '123456', user: '暗风大' },
      { time: '2018年6月8日', earnings: '0.0001', invitecode: '123456', user: '暗风大' },
      { time: '2018年6月8日', earnings: '0.0001', invitecode: '123456', user: '暗风大' },
      { time: '2018年6月8日', earnings: '0.0001', invitecode: '123456', user: '暗风大' },
      { time: '2018年6月8日', earnings: '0.0001', invitecode: '123456', user: '暗风大' },
      { time: '2018年6月8日', earnings: '0.0001', invitecode: '123456', user: '暗风大' },
      { time: '2018年6月8日', earnings: '0.0001', invitecode: '123456', user: '暗风大' },
      { time: '2018年6月8日', earnings: '0.0001', invitecode: '123456', user: '暗风大' },
      { time: '2018年6月8日', earnings: '0.0001', invitecode: '123456', user: '暗风大' },
    ], 
    isShowAd: false,
    isShowEarnings: false,
    isShowInviteEarnings: false, 
    isShowPublishEarnings: false, 

    isShowContentproviderView: false,
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
    this.initView();
  },
  initView: function(){
    // 判断用户角色
    switch (this.data.userInfo.userRole) {
      case USER_ROLE_DISTRIBUTORS:
        this.switcDistributorslRole();
        break;
      case USER_ROLE_CONTENTPROVIDER:
        this.switchContentproviderRole();
        break;
      case USER_ROLE_CONSUMERS:
        break;
      case USER_ROLE_NORMAL:
      default:
        this.setData({
          isShowAd: true,
          isShowEarnings: false
        })
        break;
    }
  },
  clickAvatar: function () {
    // 判断用户角色
    switch(this.data.userInfo.userRole){
      case USER_ROLE_DISTRIBUTORS:
        this.switcDistributorslRole();
        break;
      case USER_ROLE_CONTENTPROVIDER:
        // this.switchContentproviderRole();
        break;
      case USER_ROLE_CONSUMERS:
        break;
      case USER_ROLE_NORMAL:
      default:
        this.switchNormalRole();
      break;
    }
  },
  switchNormalRole: function(){
    this.setData({
      isShowAd: !this.data.isShowAd,
      isShowEarnings: !this.data.isShowEarnings
    })
  }, 
  switcDistributorslRole: function () {
    this.setData({
      isShowInviteEarnings: true
    })
  },
  switchContentproviderRole: function(){
    this.setData({
      isShowContentproviderView: true
    })
  },
})
