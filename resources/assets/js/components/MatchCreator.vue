<template>
<div>
    <div class ="box is-centered">
                <div class="content">
                <h3 class="title">Match Creator</h3>
                <h6 class="subtitle">Drag and drop players into each team</h6>
                <div class = "columns is-centered is-multiline">
                    <div class="column is-half">
                        <table class="table is-striped is-fullwidth">
                            <thead><th>Team 1</th></thead>
                            <tbody>
                                <tr v-for="player in dire" v-bind:key="player.id">
                                    <td>{{player.username}} - {{player.rankTier}}</td>
                                </tr>
                            </tbody>
                            </table>
                    </div>
                    <div class="column is-half">
                        <table class="table is-striped is-fullwidth">
                            <thead><th>Team 2</th></thead>
                            <tbody>
                                <tr><td>Position 1 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 2 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 3 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 4 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                                <tr><td>Position 5 <i class="far fa-plus-square" aria-hidden="true"></i></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="column is-two-thirds">
                    <div class="control">
                        <form method="post" action="" enctype="multipart/form-data">
                            
                        <div class="field">
                            <label class="label">Match Name</label>
                            <div class="control has-icons-left">
                                <input class="input is-hovered" type="text" placeholder="Match Name" name="name">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-gamepad"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                                <label class="label">Scheduled Start Time (BST)</label>
                                <div class="control has-icons-left">
                                        <div class="select is-primary is-small">
                                            <select class ="is-hovered" name ="hours">
                                                <option value ="17">17</option>
                                                <option value ="18">18</option>
                                                <option value ="19">19</option>
                                                <option value ="20">20</option>
                                                <option value ="21">21</option>
                                                <option value ="22">22</option>
                                                <option value ="23">23</option>
                                            </select>
                                        </div>
                                        :
                                        <div class="select is-primary is-small">
                                            <select class ="is-hovered" name ="minutes">
                                                <option value ="00">00</option>
                                                <option value ="15">15</option>
                                                <option value ="30">30</option>
                                                <option value ="45">45</option>
                                            </select>
                                        </div>   
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                </div>
                            </div>
    
                        <p class="help">
                            Random Lobby Password will be generated
                        </p>
                        <button class="button is-primary" type="submit">Create Game</button>
                        </form>
                        
                    </div>
                    </div>
                </div>
                </div>
                
            </div>
            </div>
</template>

<script>
export default {
    name: 'match-creator',
    data:() => {
        return {
            dire:[],
            radiant:[]
        }
    },
    created(){
        let self = this;
        this.$bus.$on('add-dire', function (player) {
            self.addDirePlayer(player)
        })
    },
    methods:{
        addDirePlayer(player){
            if(this.dire.length <=4){
                  this.dire.push(player)
            }
        },
        removeDirePlayer(player){
            //remove dire player
        }
    }
}
</script>
