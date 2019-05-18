<template>
  <div>
    <h2>Videos</h2>
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
      <button class="btn btn-danger ">Delete</button>
    </div>
  </div>
</template>


<script>
import { fileURLToPath } from "url";
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
      pagination: {}
    };
  },

  created() {
    this.fetchVideos();
  },

  methods: {
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
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };
      this.pagination = pagination;
    }
  }
};
</script>
