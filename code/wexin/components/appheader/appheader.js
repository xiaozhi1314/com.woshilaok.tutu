// pages/appheader/appheader.js
Component({
  /**
   * 组件的属性列表
   */
  properties: {
    userInfo: { // 属性名
      type: Object, // 类型（必填），目前接受的类型包括：String, Number, Boolean, Object, Array, null（表示任意类型）
      value: {
        name: '我是王宝强',
        money: '100.01',
        avatar: '/images/logo.png',
        userRole: 1,
      }, // 属性初始值（可选），如果未指定则会根据类型选择一个
      observer: function (newVal, oldVal) { } // 属性被改变时执行的函数（可选），也可以写成在methods段中定义的方法名字符串, 如：'_propertyChange'
    },
  },

  /**
   * 组件的初始数据
   */
  data: {
    isShowInvite: false,
    inviteCode: '',
    isShowInviteBtn: true,
    isShowPublishBtn: true,
    isShowRefreshBtn: false, 
    isShowWithdrawalBtn: true,
  },

  /**
   * 组件的方法列表
   */
  methods: {
    _showInviteForm: function () {
      this.setData({
        isShowInvite: !this.data.isShowInvite
      });
    },
    _inviteFormInput: function (e) {
      this.setData({
        inviteCode: e.detail.value
      });
    },
    _showEarnings: function(){
      this.triggerEvent('clickAvatar', {});
    }
  }
})
