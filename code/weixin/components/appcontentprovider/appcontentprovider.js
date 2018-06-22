// components/appcontentprovider/appcontentprovider.js
Component({
  /**
   * 组件的属性列表
   */
  properties: {

  },

  /**
   * 组件的初始数据
   */
  data: {
    isShowInviteEarnings: false,
    isShowPublishList: true,
    isShowEarningsList: false,
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
  },

  /**
   * 组件的方法列表
   */
  methods: {

    _switchTab: function(event){
      let isShowPublish = false;
      if(event.target.id == 'publish'){
        isShowPublish = true;
      }
      if (this.data.isShowPublishList != isShowPublish){
        this.setData({
          isShowPublishList: isShowPublish,
          isShowEarningsList: !isShowPublish,

          isShowInviteEarnings: !isShowPublish,
        });
      }
    }
  }
})
