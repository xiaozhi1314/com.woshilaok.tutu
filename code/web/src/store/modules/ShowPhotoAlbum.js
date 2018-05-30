import Vue from 'vue'
import Vuex from 'vuex'
import Api from '@/api/api.js'

Vue.use(Vuex);

const state = {
  isShow: false,
  isEnd: false,
  albumDetail: [],
}
const getters = {
};

const actions = {
  getAlbumDetail(context, requestParams){
    context.commit('setWaitStatus', true);
    Api.networkRequest(Api.serverUrlList.getPhotoAlbumDetail, {
      __type: 'jsonp',
      id: requestParams['id'],
      pageIndex: requestParams['page'],
    }).then(function(response){
      // 处理业务逻辑
      if(response.success === '1'){
        if(response.data.nextPageIndex === '-1'){
          context.commit('setIsEnd', true);
        }
        if(requestParams['page'] == 1){
          context.commit('setAlbumDetail', response.data.rows);
        }else{
          context.commit('addAlbumDetail', response.data.rows);
        }
      }
      context.commit('setWaitResult', response.message);
      context.commit('setWaitStatus', false);
    });
  }
};

const mutations = {
  setIsShow(state, isShow){
    state.isShow = isShow;
  },
  setIsEnd(state, isEnd){
    state.isEnd = isEnd;
  },
  setAlbumDetail(state, list){
    state.albumDetail = list;
  },
  addAlbumDetail(state, list){
    state.albumDetail = state.albumDetail.concat(list);
  }
}

export default{
  state,
  getters,
  actions,
  mutations
}