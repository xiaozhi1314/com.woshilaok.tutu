// pages/appheader/appheader.js

// 1：普通用户 2：分销商 3：内容提供者 4：消费者
const USER_ROLE_NORMAL = 1;
const USER_ROLE_DISTRIBUTORS = 2;
const USER_ROLE_CONTENTPROVIDER = 3;
const USER_ROLE_CONSUMERS = 4;

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
    isShowInviteCode: false,
    inviteCode: '1231231',
    isShowInviteBtn: true,
    isShowPublishBtn: false,
    isShowRefreshBtn: false, 
    isShowWithdrawalBtn: false,
  },
  attached:function(){
    switch (this.data.userInfo.userRole) {
      case USER_ROLE_NORMAL:
        break;
      case USER_ROLE_DISTRIBUTORS:
        this.setData({
          isShowWithdrawalBtn: true
        }); 
        break;
      case USER_ROLE_CONTENTPROVIDER:
        this.setData({
          isShowPublishBtn: true,
          isShowWithdrawalBtn: true
        });
        break;
      case USER_ROLE_CONSUMERS: 
        break;
    }
  },

  /**
   * 组件的方法列表
   */
  methods: {
    _showInviteForm: function () {
      switch(this.data.userInfo.userRole){
        case USER_ROLE_NORMAL:
          this.setData({
            isShowInvite: !this.data.isShowInvite
          });
        break;
        case USER_ROLE_DISTRIBUTORS:
          this.setData({
            isShowInviteCode: !this.data.isShowInviteCode
          });
        break;
        case USER_ROLE_CONTENTPROVIDER:
          this.setData({
            isShowInviteCode: !this.data.isShowInviteCode
          });
        break;
        case USER_ROLE_CONSUMERS:
        break;
      }
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
