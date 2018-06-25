<template>
  <!-- show a search box and list of players -->


    <div>
 <div class ="box">
                <article class = "media">
          <div class="media-content">
                        <div class="content"> 
                            <h3 class="title">Player Search</h3>
      
        <p class="control has-icons-left">
            <input class="input is-small" type="text" placeholder="Search for tards by Username" id="inputSearch" v-model="search_term">
            <span class="icon is-small is-left">
                <i class="fas fa-search" aria-hidden="true"></i>
            </span>
        </p>

        <table class="table is-striped" id="playerTable">
            <thead>
                <th></th>
                <th @click="sort('username')">Username</th>
                <th @click="sort('rank')">Rank</th>
                <th @click="sort('mmr')">MMR estimate</th>
                <th>Actions</th>
                <th>Status</th>
            </thead>
            <tbody>
                <player-list-item v-for="player in orderedPlayers" :player="player" :key="player.id64">
                </player-list-item>
            </tbody>
        </table>
                                </div>
                    </div>
                </article></div>
    </div>  
</template>


<script>
import PlayerListItem from '../components/PlayerListItem.vue' 
export default {
  props: [
      'players'
  ],
  data: () => {
      return{
          search_term: "",
          currentSort:'mmr',
          currentSortDir:'desc'
      }
  },
  components:{
      PlayerListItem
  },
  methods:{
    sort:function(s) {
    //if s == current sort, reverse
        if(s === this.currentSort) {
        this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
        }
        this.currentSort = s;
        }
  },
  computed:{
      filteredPlayers: function(){
          return this.players.filter((player) => {
              return player.username.toLowerCase().includes(this.search_term.toLowerCase())
          })
      },
      orderedPlayers:function() {
      return this.filteredPlayers.sort((a,b) => {
      let modifier = 1;
      if(this.currentSortDir === 'desc') modifier = -1;
      if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
      if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
      return 0;
    });
  }
  }
}
</script>
