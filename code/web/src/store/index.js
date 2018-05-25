import Vue from 'vue'
import Vuex from 'vuex'
import Api from '@/api/api.js'

Vue.use(Vuex);

const state = {
    isSearch: false,
    isLoadMore: false,
    page: 1,
    pageSize: 10,
    shenKeyInfoList: [],
    waitStatus: false,
    waitResult: '',
}
const getters = {

};

const actions = {
    addShenkeyInfo(context, params){
        context.commit('setWaitStatus', true);
        Api.networkRequest('http://api.woshilaok.com/shenkey/v1/apiAddShenKeyInfo', 
        {
            code: params['code'],
            author: params['author'],
            describe: params['describe'],
        }).then(function(response){
            context.commit('setWaitResult', response.message);
            context.commit('setWaitStatus', false);
        });
    },
    getShenKeyInfoList(context, params){
        if(params.isSearch){
            context.commit('setShenKeyInfoList', []);
        }
        context.commit('setIsSearch', params.isSearch);
        context.commit('setIsLoadMore', false);
        Api.networkRequest('http://api.woshilaok.com/shenkey/v1/apiGetShenKeyInfoList', 
            {
                keyword: params.keyword,
                page: context.state.page,
                pagesize: context.state.pageSize
            }).then(function(response){
            if(response.success == true){
              if(response.data !== undefined && response.data.length > 0){
                if(response.data.length == context.state.pageSize){
                    context.commit('setPage', context.state.page + 1);
                    context.commit('setIsLoadMore', true);
                }
                context.commit('setShenKeyInfoList', response.data);
              }else{
                context.commit('setShenKeyInfoList', []);
              }
            }
        });
    },
};

const mutations = {
    setPage(state, page){
        state.page = page;
    },
    setIsSearch(state, isSearch){
        state.isSearch = isSearch;
    },
    setIsLoadMore(state, isLoadMore){
        state.isLoadMore = isLoadMore;
    },
    setShenKeyInfoList(state, shenKeyInfoList){
        state.shenKeyInfoList = state.isSearch ? shenKeyInfoList : state.shenKeyInfoList.concat(shenKeyInfoList);
    },
    setWaitStatus(state, waitStatus){
        state.waitStatus = waitStatus;
    },
    setWaitResult(state, waitResult){
        state.waitResult = waitResult;
    }
}

export default new Vuex.Store({
    state,
    getters,
    actions,
    mutations
})