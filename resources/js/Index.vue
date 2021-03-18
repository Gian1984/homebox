<template>
  <v-app id="inspire">
     <v-navigation-drawer
      v-model="drawer"
      app
      class="pt-4"
      color="transparent"
      absolute
      temporary
      mini-variant
    >

      <router-link to="/" exact-path style="text-decoration: none;">
          <v-btn
          class="mx-2 mt-4"
          depressed
          fab
          dark
          small
          color="teal lighten-1"
          >
          <v-icon dark>
              mdi-home
          </v-icon>
        </v-btn>
      </router-link>

      <router-link to="/dashboard" exact-path style="text-decoration: none;">
          <v-btn
          class="mx-2 mt-4"
          fab
          dark
          small
          color="teal lighten-1"
          >
          <v-icon dark>
              mdi-pill
          </v-icon>
        </v-btn>
      </router-link>

      <router-link to="/projects" exact-path style="text-decoration: none;">
          <v-btn
          class="mx-2 mt-4"
          fab
          dark
          small
          color="teal lighten-1"
          >
          <v-icon dark>
              mdi-animation-outline
          </v-icon>
        </v-btn>
      </router-link>

      <router-link to="/team" exact-path style="text-decoration: none;">
          <v-btn
          class="mx-2 mt-4"
          fab
          dark
          small
          color="teal lighten-1"
          >
          <v-icon dark>
              mdi-account-group
          </v-icon>
        </v-btn>
      </router-link>
      
    </v-navigation-drawer>

    <v-app-bar app flat color="white">
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>
        <span class="font-weight-light">HOME</span>
        <span>BOX</span>
      </v-toolbar-title>

      <v-spacer></v-spacer>
      
      <PopupRegister v-on:register="register($event)"/>

      <PopupLogin v-on:login="login($event)"/>


      <v-btn @click="logout" depressed small text >
          <span>Sign out</span>
          <v-icon>mdi-exit-to-app</v-icon>
      </v-btn>

    </v-app-bar>

    <v-main>
      <router-view class="mx-5 mb-5 my-3"></router-view>
    </v-main>
  </v-app>
</template>

<script>

import PopupLogin from './components/PopupLogin'
import PopupRegister from './components/PopupRegister'

  export default {

    components: {
      PopupLogin,
      PopupRegister,
    },

    data () {
      return {
      
        drawer: null,
      
      
      
      }
    },

    methods: {
    
      register(register){

          axios.post('api/register',register).then(response=>{
            
            this.$router.push({ path: "/dashboard" });

          }).catch((error)=>{
                this.errors = error.response
          })

      },

      login(login){

          axios.post('api/login',login).then(response=>{ 

          this.$router.push({ path: "/" });
          

          }).catch((error)=>{
              this.errors = error.response
              this.$delete(project)
          })

      },

      logout(){
            axios.post('api/logout').then(response=>{
            this.$router.push({ path: "/dashboard" });

          })
      }

    },
  }
</script>

<style scoped>

</style>
