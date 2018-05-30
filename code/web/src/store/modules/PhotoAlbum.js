import Vue from 'vue'
import Vuex from 'vuex'
import Api from '@/api/api.js'

Vue.use(Vuex);

const state = {
  isShow: false,
  isEnd: false,
  pageIndex: 1,
  albumList: [],
}
const getters = {
};

const actions = {
  getAlbumList(context, requestParams){
    context.commit('setWaitStatus', true);
    Api.networkRequest(Api.serverUrlList.getPhotoAlbumList, {
      __type: 'jsonp',
      tags: requestParams['tags'],
      pageIndex: requestParams['page'],
    }).then(function(response){
      // 处理业务逻辑
      if(response.success === '1'){
        if(response.data.nextPageIndex === '-1'){
          context.commit('setIsEnd', true);
        }else{
          context.commit('setPageIndex', ++context.state.pageIndex);
        }
        if(requestParams['page'] == 1){
          context.commit('setAlbumList', response.data.rows);
        }else{
          context.commit('addAlbumList', response.data.rows);
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
  setPageIndex(state, pageIndex){
    state.pageIndex = pageIndex;
  },
  setAlbumList(state, list){
    state.albumList = list;
  },
  addAlbumList(state, list){
    state.albumList = state.albumList.concat(list);
  }
}

export default{
  state,
  getters,
  actions,
  mutations
}