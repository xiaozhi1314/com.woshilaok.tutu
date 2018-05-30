<template>
  <div class="photoalbum">
    <h2>主题</h2>
    <div class="images row">
      <div class="card border-secondary image-card" v-for="(item, index) in albumList" :key="index">
        <!-- <div class="card-header"></div> -->
        <img class="card-img-top img-fluid" @click="showPhotoAlbumClick(item.id)" :src="item.coverImg">
        <div class="card-body">
            <h4 class="card-title">{{ item.title }}</h4>
            <!-- <p class="card-text lead text-left">{{ item.desc }}</p> -->
            <p class="card-text text-right">{{ item.formatTime }}</p>
        </div>
        <!-- <div class="card-footer">
            <span class="col-sm-4">阅读数</span>
            <span class="col-sm-4">阅读数</span>
            <span class="col-sm-4">阅读数</span>
        </div> -->
      </div>
    </div>
    <br>
    <br>
    <h2 v-on:click="loadMore">查看更多</h2>
    <br>
    <br>
    <!-- <div class="row justify-content-center">
        <nav aria-label="...">
            <ul class="pagination pagination-lg">
                <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
            </ul>
        </nav>
   </div> -->
   <show-photo-album></show-photo-album>
  </div>
</template>

<script>
import ShowPhotoAlbum from '@/components/ShowPhotoAlbum'
import {mapState, mapGetters, mapActions, mapMutations} from 'vuex'

export default {
  name: 'PhotoAlbum',
  components: {ShowPhotoAlbum},
  data () {
    return {
      showPhotoAlbum: false,
    }
  },
  computed: {
    ...mapState({
      isEnd: state => state.PhotoAlbum.isEnd,
      pageIndex: state => state.PhotoAlbum.pageIndex,
      currentPhotoTag: state => state.currentPhotoTag,
      albumList: state => state.PhotoAlbum.albumList,
    })
  },
  watch: {
    currentPhotoTag: function(newValue, oldValue){
      this.$store.dispatch('getAlbumList', {tags:this.currentPhotoTag, page:1});
    }
  },
  methods:{
    loadMore(){
			if(this.isEnd === false){
				this.$store.dispatch('getAlbumList', {tags:this.currentPhotoTag, page:this.pageIndex});
			}
    },
    showPhotoAlbumClick(albumId){
			this.$store.dispatch('getAlbumDetail', {id:albumId, page:1});
      this.$store.commit('setIsShow', true);
    }
  },
  mounted(){
		this.$store.dispatch('getAlbumList', []);
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .card{
    width:360px;
    margin: 10px 10px;
  }
  .card-img-top{
    background-image: url('~@/assets/default_300x200.png');
  }
</style>
