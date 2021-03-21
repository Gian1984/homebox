<template>
    <div>
        <v-card-text>
            <v-chip-group
                active-class="deep-purple accent-4 white--text"
                column
            >
                <v-chip
                    x-small
                    color="pink darken-1"
                    outlined
                    v-on:click="setJazz"
                    >
                    <v-icon left>
                        mdi-play
                    </v-icon>
                    Jazz
                </v-chip>

                <v-chip
                    x-small
                    color="pink darken-1"
                    outlined
                    v-on:click="setRock"
                    >
                    <v-icon left>
                        mdi-play
                    </v-icon>
                    Rock
                </v-chip>

                <v-chip
                    x-small
                    color="pink darken-1"
                    outlined
                    v-on:click="setPop"
                    >
                    <v-icon left>
                        mdi-play
                    </v-icon>
                    Pop
                </v-chip>

                <v-chip
                    x-small
                    color="pink darken-1"
                    outlined
                    v-on:click="setDance"
                    >
                    <v-icon left>
                        mdi-play
                    </v-icon>
                    Dance
                </v-chip>

                <v-chip
                    x-small
                    color="pink darken-1"
                    outlined
                    v-on:click="setRadio"
                    >
                    <v-icon left>
                        mdi-play
                    </v-icon>
                    Radio
                </v-chip>

            </v-chip-group>
        </v-card-text>
    </div>
</template>

<script>
export default {
    data() {

       return {
           
            jazz: [
                {
                genre:'Jazz',  
                title: 'Jazzaddict’s Intro',
                artist: 'Cosimo Fogg',
                src: '/assets/cosimo.mp3',
                color: 'deep-purple lighten-1',
                },
                {
                genre:'Jazz',    
                title: 'Entering the Head',
                artist: 'Komiku',
                src: '/assets/Komiku.mp3',
                color: 'green',
                },
                {
                genre:'Jazz',    
                title: 'The Jazz Piano',
                artist: 'Benjamin Tissot',
                src: '/assets/thejazzpiano.mp3',
                color: 'light-blue',
                },

            ],

            pop: [
                {
                genre:'Pop',  
                title: 'Energy',
                artist: 'Anonimus',
                src: '/assets/energy.mp3',
                color: 'deep-purple lighten-1',
                },
                {
                genre:'Pop',    
                title: 'Entering the Head',
                artist: 'Komiku',
                src: '/assets/Komiku.mp3',
                color: 'green',
                },
                {
                genre:'Pop',    
                title: 'The Jazz Piano',
                artist: 'Benjamin Tissot',
                src: '/assets/thejazzpiano.mp3',
                color: 'light-blue',
                },

            ],

            rock: [
                {
                genre:'Rock',  
                title: 'Happy Rock',
                artist: 'Anonimus',
                src: '/assets/happyrock.mp3',
                color: 'deep-purple lighten-1',
                },
                {
                genre:'Rock',    
                title: 'Entering the Head',
                artist: 'Komiku',
                src: '/assets/Komiku.mp3',
                color: 'green',
                },
                {
                genre:'Rock',    
                title: 'The Jazz Piano',
                artist: 'Benjamin Tissot',
                src: '/assets/thejazzpiano.mp3',
                color: 'light-blue',
                },

            ],

            dance: [
                {
                genre:'Dubstep',  
                title: 'Free Dubstep',
                artist: 'Anonimus',
                src: '/assets/dubstep.mp3',
                color: 'deep-purple lighten-1',
                },
                {
                genre:'Dance',    
                title: 'Entering the Head',
                artist: 'Komiku',
                src: '/assets/Komiku.mp3',
                color: 'green',
                },
                {
                genre:'Dance',    
                title: 'The Jazz Piano',
                artist: 'Benjamin Tissot',
                src: '/assets/thejazzpiano.mp3',
                color: 'light-blue',
                },   
            ],

            radio: [
                {
                genre:'Rock - Pop',  
                title: 'Virgin Radio',
                artist: 'Italy',
                src: 'http://icecast.unitedradio.it/Virgin.mp3',
                color: 'deep-purple lighten-1',
                },

                {
                genre:'Tendence - Pop',    
                title: 'Radio Monte Carlo 1',
                artist: 'Italy',
                src: 'http://edge.radiomontecarlo.net/RMC.mp3',
                color: 'light-blue',
                },
                
                {
                genre:'Tendence - Pop',    
                title: 'Kiss Kiss Radio',
                artist: 'Italy',
                src: 'http://ice07.fluidstream.net:8080/KissKiss.mp3',
                color: 'green',
                },
            ],
        }
    },

    methods: {
    
      setJazz(){
          this.$emit('changePlaylist', this.jazz)
      },

      setPop(){
          this.$emit('changePlaylist', this.pop)
      },

      setRock(){
          this.$emit('changePlaylist', this.rock)
      },

      setDance(){
          this.$emit('changePlaylist', this.dance)
      },

      setRadio(){
          this.$emit('changePlaylist', this.radio)
      },
    }
}
</script>

<style scoped>

</style>