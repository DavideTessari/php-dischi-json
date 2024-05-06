<script>
import axios from 'axios';

export default {
  name: 'App',
  data() {
    return {
      albums: [],
      loading: true
    };
  },
  mounted() {
    this.fetchAlbums();
  },
  methods: {
    fetchAlbums() {
      axios.get('api.php')
        .then(response => {
          this.albums = response.data;
          this.loading = false;
        })
        .catch(error => {
          console.error('Error fetching albums:', error);
          this.loading = false;
        });
    }
  }
}
</script>

<template>
  <div id="app">
    <h1>Lista Dischi</h1>
    <div v-if="loading">Caricamento...</div>
    <div v-else>
      <div v-for="album in albums" :key="album.title">
        <h2>{{ album.title }}</h2>
        <p>{{ album.artist }}</p>
        <p>{{ album.year }}</p>
        <img :src="album.poster" alt="Poster">
        <p>{{ album.genre }}</p>
        <hr>
      </div>
    </div>
  </div>
</template>

<style>

</style>
