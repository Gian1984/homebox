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

      <v-tooltip right>
        <template v-slot:activator="{ on, attrs }">
          <router-link to="/dashboard" exact-path style="text-decoration: none;">
              <v-btn
              class="mx-2 mt-4"
              v-on="on"
              v-bind="attrs"
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
        </template>
        <span>Need to be logged in to access dashboard!</span>
      </v-tooltip>

      <v-tooltip right>
        <template v-slot:activator="{ on, attrs }">
          <router-link to="/projects" exact-path style="text-decoration: none;">
              <v-btn
              v-on="on"
              v-bind="attrs"
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
        </template>
          <span>Need to be logged in to access personal task!</span>
      </v-tooltip>


      <v-tooltip right>
        <template v-slot:activator="{ on, attrs }">
          <router-link
              to="/team" 
              exact-path style="text-decoration: none;"
              >
              <v-btn
              v-on="on"
              v-bind="attrs"
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
        </template>
        <span>Need to be logged in to access team!</span>
      </v-tooltip>

       <v-tooltip right>
        <template v-slot:activator="{ on, attrs }">
          <router-link
              to="/account" 
              exact-path style="text-decoration: none;"
              >
              <v-btn
              v-on="on"
              v-bind="attrs"
              class="mx-2 mt-4"
              fab
              dark
              small
              color="teal lighten-1"
              >
              <v-icon dark>
                  mdi-account-circle
              </v-icon>
            </v-btn>
          </router-link>
        </template>
        <span>Need to be logged in to access account!</span>
      </v-tooltip>
      
    </v-navigation-drawer>

    <v-app-bar app flat color="white">
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>
        <span class="font-weight-light">HOME</span>
        <span>BOX</span>
      </v-toolbar-title>

      <v-spacer></v-spacer>
      
      <PopupRegister v-on:register="register($event)" :errorReg="errorReg" @update-register="updateRegister" :logged="logged"/>

      <PopupLogin v-on:login="login($event)" :user="user" :errorLog="errorLog" @update-login="updateLogin"/>


      <v-btn 
        @click="logout" 
        depressed 
        small 
        text
        v-if="(typeof (this.logged) !== typeof(''))" 
      >
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
        user:'',
        errorLog:'',
        errorReg:'',
        logged:'',
      
      }
    },

    methods: {
    
      register(register){

          axios.post('api/register',register).then(response=>{
            this.$router.push({ path: "/" });

          }).catch((error)=>{
              this.errorReg = error.response
          })

      },
      updateRegister(error){
        this.errorReg=error;
      },

      login(login){
 
          axios.post('api/login',login).then(response=>{ 
          this.user = response.data;
          this.logged = this.user
          this.$router.push({ path: "/" });
          
          }).catch((error)=>{
            this.errorLog=error.response
          })

      },
      updateLogin(error){
        this.errorLog=error;
      },
    
      getLoggedUser(){
        
          axios.get('/api/userlogged').then(response => {
          this.logged = response.data;
          })
          .catch(error =>{
          console.log(error);
          })
      },


      logout(){
            axios.post('api/logout').then(response=>{
            this.$router.push({ path: "/logout" });
            return this.logged=''
          })
      }

    },

    created(){

        this.getLoggedUser();
  }
  }
</script>

<style scoped>

</style>
