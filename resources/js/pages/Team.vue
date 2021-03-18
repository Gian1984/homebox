<template>
  <div class="team">
    <h1 class="title">Team</h1>

    <v-container fluid class="my-5">
      <v-row wrap>
          <v-flex xs12 sm6 md4 lg3 v-for="person in team" :key="person.name">
                <v-card
                    class="ma-1"
                    max-width="344"
                    outlined
                    color="teal lighten-5"      
                >
                    <v-list-item three-line>
                    <v-list-item-content>
                        <div class="overline mb-4">
                        {{person.role}}
                        </div>
                        <v-list-item-title class="headline mb-1">
                        <p class="caption font-weight-bold">{{person.name}}</p>
                        </v-list-item-title>
                        <v-list-item-subtitle class="caption mt-2 font-italic">"{{person.think}}"</v-list-item-subtitle>
                        <v-spacer></v-spacer>
                        <v-list-item-subtitle class="caption mt-2 text-right">{{person.author}}</v-list-item-subtitle>
                    </v-list-item-content>

                    <v-list-item-avatar tile size="80">
                        <img :src="person.avatar">
                    </v-list-item-avatar>
                    </v-list-item>

                    <v-card-actions>
                    <v-btn
                        small
                        outlined
                        rounded
                        text
                        color="pink darken-1"
                    >
                    <v-icon small>mdi-forum</v-icon>
                        Message
                    </v-btn>
                    </v-card-actions>
                </v-card>
          </v-flex>
      </v-row>
    </v-container>

  </div>
</template>

<script>

export default {
  data() {
    return {
      team: [
        { name: 'Gianluca Tiengo', role: 'Web developer', think:'I am not what I think. I am thinking what I think.', author:'— Eric Butterworth', avatar:'../img/sdengo.png'},
        { name: 'Giacomo Rosso', role: 'Graphic designer', think: 'Belief is when someone else does the thinking.', author:'— Buckminster Fuller', avatar:'/img/jaques.png'},
        { name: 'Marco Di Maio', role: 'Web developer', think:'Better to be without logic than without feeling.', author:'— Charlotte Bronte', avatar:'/img/dima.png' },
        { name: 'Paolo Properzi', role: 'Social media', think: 'Did you ever stop to think, and forget to start again?', author:'— Winnie the Pooh', avatar:'/img/prop.png'},
        { name: 'Alessandro Pozzato', role: 'Sales guru', think: 'I succeeded by saying what everyone else is thinking.', author:'— Joan Rivers', avatar:'/img/pozzi.png'}
      ]
    }
  }
}
</script>