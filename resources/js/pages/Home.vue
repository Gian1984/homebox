<template>
    <div class="home">
    <h1 class="title">Music</h1>

    <v-container fluid class="my-5">
      <v-row wrap>
          <!-- <v-flex xs12 sm6 md4 lg3> -->
                <v-card
                    v-scroll.self="onScroll"
                    class="overflow-y-auto ma-1"
                    max-height="230"
                    min-width="100%"
                    outlined
                    color="teal lighten-5"     
                >
                  <v-row no-gutters>
                    <v-col>
                    <v-list-item three-line>
                      <v-list-item-content>
                          <div class="overline mb-2">
                          {{ current.genre }}
                          </div>
                          <v-list-item-title class="headline">
                          <p class="caption font-weight-bold">{{ current.artist }} - {{ current.title }}</p>
                          </v-list-item-title>
                      </v-list-item-content>

                    </v-list-item>

                     <MusicSwitch v-on:changePlaylist="changePlaylist($event)"/>
                     
                    <v-card-actions class="ml-1">

                    <v-btn
                        small
                        outlined
                        rounded
                        text
                        color="pink darken-1"
                        @click="prev"
                    >
                    <v-icon small>mdi-page-first</v-icon>
                    </v-btn>

                    <v-btn
                        small
                        outlined
                        rounded
                        text
                        color="pink darken-1"
                        v-if="!isPlaying" @click="play"
                    >
                    <v-icon small>mdi-play</v-icon>
                    </v-btn>

                    <v-btn
                        small
                        outlined
                        rounded
                        text
                        color="pink darken-1"
                        v-else @click="pause"
                    >
                    <v-icon small>mdi-pause</v-icon>
                    </v-btn>

                    <v-btn
                        small
                        outlined
                        rounded
                        text
                        color="pink darken-1"
                        @click="next"
                    >
                    <v-icon small>mdi-page-last</v-icon>
                    </v-btn>

                    </v-card-actions>

                    </v-col>
                    <v-col>
                    <!-- <av-bars
                      caps-color="#FFF"
                      :bar-color="['#f00', '#ff0', '#0f0']"
                      canv-fill-color="#000"
                      :caps-height="2"
                      audio-src="/assets/cosimo.mp3">
                    </av-bars> -->
                    <v-card-text>
                        <div class="font-weight-bold ml-8 mb-2">
                            Playlist
                        </div>

                        <v-timeline
                            align-top
                            dense
                        >
                            <v-timeline-item
                            v-for="song in songs"
                            :key="song.src" 
                            :color="song.color"
                            small
                            >
                            <div>
                                <v-btn
                                    x-small
                                    outlined
                                    rounded
                                    text
                                    color="grey lighten-1"
                                    @click="play(song)" :class="(song.src == current.src) ? 'song playing' : 'song'">
                                    <v-icon left>
                                      mdi-play
                                    </v-icon>
                                    {{ song.title }} - {{ song.artist }}
                                </v-btn>
                            </div>
                            </v-timeline-item>
                        </v-timeline>
                    </v-card-text>
                    </v-col>
                    </v-row>
                </v-card>
          <!-- </v-flex> -->
      </v-row>
    </v-container>
    <Weather/>
  </div>
</template>

<script>

import MusicSwitch from '../components/MusicSwitch'
import Weather from '../components/Weather'
import AudioVisual from 'vue-audio-visual'

export default {

    components: {
      MusicSwitch,
      AudioVisual,
      Weather
    },

    data () {
    return {

      scrollInvoked: 0,  
      current: {},
      index: 0,
      isPlaying: false,

      songs: [
        {
          genre:'Welcome!',  
          title: 'Choise your playlist and click on first song!',
          artist: "Let's start!",
          src: '/assets/creativeminds.mp3',
          color: 'deep-purple lighten-1',
        }
      ],
      player: new Audio()
    }
  },
  methods: {

    onScroll () {
        this.scrollInvoked++
    },

    changePlaylist(playlist){
      this.songs = playlist
    },

    play (song) {
      if (typeof song.src != "undefined") {
        this.current = song;
        this.player.src = this.current.src;
      }
      this.player.play();
      this.player.addEventListener('ended', function () {
        this.index++;
        if (this.index > this.songs.length - 1) {
          this.index = 0;
        }
        this.current = this.songs[this.index];
        this.play(this.current);
      }.bind(this));
      this.isPlaying = true;
    },


    pause () {
      this.player.pause();
      this.isPlaying = false;
    },


    next () {
      this.index++;
      if (this.index > this.songs.length - 1) {
        this.index = 0;
      }
      this.current = this.songs[this.index];
      this.play(this.current);
    },


    prev () {
      this.index--;
      if (this.index < 0) {
        this.index = this.songs.length - 1;
      }
      this.current = this.songs[this.index];
      this.play(this.current);
    }
  },

  created () {
    this.current = this.songs[this.index];
    this.player.src = this.current.src;
  },

   
}

</script>

<style scoped>
.v-icon{
     text-decoration: none !important;
 }
</style>
