// components/apppublishearnings/apppublishearnings.js
Component({
  /**
   * 组件的属性列表
   */
  properties: {
    earningsList: {
      type: Array,
      value: [
        { time: '2018年6月8日', earnings: '0.0001', invitecode: '123456', user: '暗风大' },
      ],
      observer: function (newVal, oldVal) { }
    },
  },

  /**
   * 组件的初始数据
   */
  data: {

  },

  /**
   * 组件的方法列表
   */
  methods: {

  }
})
