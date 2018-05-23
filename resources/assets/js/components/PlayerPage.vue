<template>
    <div>
        <match-creator v-if="user.is_admin"></match-creator>
        <player-list :players="players"></player-list>
    </div>
</template>

<script>
import PlayerList from '../components/PlayerList.vue' 
import MatchCreator from '../components/MatchCreator.vue' 
export default {
    name: "player-page",
    props:[
        'players',
        'user'
    ],
      components:{
      PlayerList,
      MatchCreator
  },
}
</script>
