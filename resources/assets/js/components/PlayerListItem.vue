<template>
    <tr>
        <td>
            <img :alt="player.username" :src="player.smallAvatarUrl">
        </td>
        <td>
            <a href="player.profile_url">{{ player.username }} </a>
        </td>
        <td>{{ player.rankTier }}</td>
        <td>{{ player.mmr }}</td>
    </tr>
</template>

<script>
export default {
  props:[
      'player'
  ]
}
</script>
