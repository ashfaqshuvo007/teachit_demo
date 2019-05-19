<template>
  <div>
    <h2>Videos</h2>
    <br>
    <form @submit.prevent="addVideo()" class="mb-3">
      <div class="form-group mb-3">
        <input type="text"  class="form-control" v-model="video.title" placeholder="Video Title"> 
      </div>
      <div class="form-group">
        <textarea  class="form-control" v-model="video.description" placeholder="Video Description"></textarea>
      </div>
      <button type="submit" class="btn btn-info btn-block">Add Video</button>
    </form>

    <nav aria-label="Page navigation example mt-2">
      <ul class="pagination">
        <li v-bind:class="[{disabled : !pagination.prev_page_url}]" class="page-item">
          <a class="page-link" href="#" @click="fetchVideos(pagination.prev_page_url)">Previous</a>
        </li>
        <li class="page-item disabled text-dark">
          <a class="page-link" href="#">Page : {{ pagination.current_page }} of {{ pagination.last_page }}</a>
        </li>
        <li v-bind:class="[{disabled : !pagination.next_page_url}]" class="page-item">
          <a class="page-link" href="#" @click="fetchVideos(pagination.next_page_url)">Next</a>
        </li>
      </ul>
    </nav>
    <div class="card card-body mb-2" v-for="video in videos" v-bind:key="video.videos_id">
      <h3>{{video.title }}</h3>
      <p>{{ video.description }}</p>
      <button  @click="editVideo(video)" class="btn btn-warning mb-2">Edit</button>
      <button  @click="deleteVideo(video.videos_id)" class="btn btn-danger">Delete</button>
    </div>
  </div>
</template>


<script>
// import { fileURLToPath } from "url";
export default {
  data() {
    return {
      videos: [],
      video: {
        id: "",
        title: "",
        description: "",
        url: ""
      },
      videos_id: "",
      pagination: {},
      edit:false
    };
  },

  created() {
    this.fetchVideos();
  },

  methods: {
    //Fetch all videos
    fetchVideos(page_url) {
      let vm = this;
      page_url = page_url || "/api/videos";
      fetch(page_url)
        .then(res => res.json())
        .then(res => {
          // console.log(res.data);
          this.videos = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },
    //for pagination
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
    },
    //Delete a single video
    deleteVideo(videos_id){
      console.log(videos_id);
        if(confirm('Are You Sure?')){
          fetch(`api/video/${videos_id}`,{
            method: 'delete'
          })
          .then(res =>res.json())
          .then(data => {
            alert('Video Removed!');
            this.fetchVideos();
          })
          .catch(err => console.log(err));
        }
    },

    //Add and Update videos
    addVideo(){
      if(this.edit === false){
        //add
        fetch('api/video',{
          method: 'post',
          body:JSON.stringify(this.videos),
          headers: {
            'content-type': 'application/json'
          }
        })
        .then(res =>res.json())
        .then(data => {
            this.videos.title = '';
            this.videos.description = '';
            this.fetchVideos();
        })
        .catch(err => console.log(err));
      }else{
        //Update
      }
    }
    

  }
};
</script> 
