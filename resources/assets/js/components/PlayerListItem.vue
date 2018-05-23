<template>
    <tr>
        <td>
            <img :alt="player.username" :src="player.smallAvatarUrl">
        </td>
        <td>
            <a :href="player.profile_url">{{ player.username }} </a>
        </td>
        <td>{{ player.rankTier }}</td>
        <td>{{ player.mmr }}</td>
        <!-- <td><button class="button" @click="addToDire">Dire</button></td> -->
    </tr>
</template>

<script>
export default {
  props:{
      'player': Object
  },
  mounted:()=>{
  },
  methods:{
      addToDire(){
          //send to match creator
          this.$bus.$emit('add-dire', this.player)
      }
  }
}
</script>
