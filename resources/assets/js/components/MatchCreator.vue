<template>
<div>
    <div class ="box is-centered">
                <div class="content">
                <h3 class="title">Match Creator</h3>
                <h6 class="subtitle">Drag and drop players into each team</h6>
                <div class = "columns is-centered is-multiline">
                    <div class="column is-half">
                        <table class="table is-striped is-fullwidth">
                            <thead><th>Dire</th></thead>
                            <tbody>

                                <tr v-for="(player, index) in dire" v-bind:key="player.id64">
                                    <td>
                                    <img :alt="player.username" :src="player.smallAvatarUrl">
                                    <strong>{{player.username}}</strong> <small>{{player.mmr}}</small>
                                    <button class="delete is-small is-pulled-right" @click="removeDirePlayer(index)"></button>
                                    </td>
                                </tr>                            
                            
                            </tbody>
                            </table>

                    </div>
                    <div class="column is-half">
                        <table class="table is-striped is-fullwidth">
                            <thead><th>Radiant</th></thead>
                            <tbody>
                                <tr v-for="(player, index) in radiant" v-bind:key="player.id64">
                                    <td>
                                    <img :alt="player.username" :src="player.smallAvatarUrl">
                                    <strong>{{player.username}}</strong> <small>{{player.mmr}}</small>
                                    <button class="delete is-small is-pulled-right" @click="removeRadiantPlayer(index)"></button>
                                    </td>
                                </tr>
                            </tbody>
                            </table>
                    </div>

                    <nav class="level">
                        <div class="level-item has-text-centered">
                            <div>
                                <p class="heading">Total MMR </p>
                                <p class="title is-5">{{totaldire}}</p>
                            </div>
                        </div>
                        <div class="level-item has-text-centered">
                            <div>
                                <p class="heading">Mean MMR </p>
                                <p class="title">{{averagedire}}</p>
                            </div>
                        </div>
                        <div class="level-item has-text-centered">
                            <div>
                                <p class="subtitle is-6">spacer needs to go here lol.</p>
                            </div>
                        </div>
                        <div class="level-item has-text-centered">
                            <div>
                                <p class="heading">Mean MMR </p>
                                <p class="title">{{averageradiant}}</p>
                            </div>
                        </div>
                        <div class="level-item has-text-centered">
                            <div>
                                <p class="heading">Total MMR </p>
                                <p class="title is-5">{{totalradiant}}</p>
                            </div>
                        </div>
                    </nav>

                    <progress class="progress is-info" :value="totaldire" :max="totalradiant+totaldire">Balance of Power</progress>
                    <div class="column is-two-thirds">

                    <div class="control">
                        <form  @submit.prevent="onSubmit" method="POST" action="/matches" enctype="multipart/form-data">
                            
                        <div class="field">
                            <label class="label">Match Name</label>
                            <div class="control has-icons-left">
                                <input v-model="name" class="input is-hovered" type="text" placeholder="Match Name" name="name">
                                <span class="icon is-small is-left">
                                    <i class="fas fa-gamepad"></i>
                                </span>
                            </div>
                        </div>
                        <div class="field">
                                <label class="label">Scheduled Start Time (BST)</label>
                                <div class="control has-icons-left">
                                        <div class="select is-primary is-small">
                                            <select v-model="hours" class ="is-hovered" name ="hours">
                                                <option v-for="option in options.inquiry_hours" v-bind:value="option.value">{{ option.text }}</option>
                                            </select>
                                        </div>
                                        :
                                        <div class="select is-primary is-small">
                                            <select v-model="minutes" class ="is-hovered" name ="minutes">
                                                <option v-for="option in options.inquiry_minutes" v-bind:value ="option.value">{{ option.text }}</option>
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
      props:{
      'player': Object
    },
    name: 'match-creator',
    data:() => {
        return {
            dire:[],
            radiant:[],
                name: '',
                hours: '',
                minutes: '',
            options:{
                inquiry_hours:[
                    {value: '17', text: "17"},
                    {value: '18', text: "18"},
                    {value: '19', text: "19"},
                    {value: '20', text: "20"},
                    {value: '21', text: "21"},
                    {value: '22', text: "22"},
                    {value: '23', text: "23"}
                ],
                inquiry_minutes:[
                    {value: '00', text: "00"},
                    {value: '15', text: "15"},
                    {value: '30', text: "30"},
                    {value: '45', text: "45"}
                ]
            }
        }
    },
    created(){
        let self = this;
        this.$bus.$on('add-dire', function (player) {
            self.addDirePlayer(player)
        }),
        this.$bus.$on('add-radiant', function (player) {
            self.addRadiantPlayer(player)
        })
    },
    methods:{
        addDirePlayer(player){
            if(this.dire.length <=4){
                  this.dire.push(player)
            }
        },
        removeDirePlayer(index){
            //remove dire player
            //this.dire.$remove(player)

            //return filteredItems = dire.filter(dire => dire !== player);

        this.dire.splice(index, 1);

        },
        
        addRadiantPlayer(player){
            if(this.radiant.length <=4){
                  this.radiant.push(player)
            }
        },
        removeRadiantPlayer(index){
            //remove radiant player
            this.radiant.splice(index, 1)
        },
        onSubmit(){
            axios.post('/matches', this.$data).then(function(){
                window.location = '/matches';
            });
        }
    },
    computed:{
        totaldire: function(){
            console.log(this.dire);
            return this.dire.reduce(function(totaldire, item){
                return totaldire + item.mmr;
            },0);
        },
        totalradiant: function(){
            console.log(this.radiant);
            return this.radiant.reduce(function(totalradiant, item){
                return totalradiant + item.mmr;
            },0);
        },
        averageradiant: function(){
            console.log(this.totalradiant);
            return this.totalradiant/5;
        },
        averagedire: function(){
            console.log(this.totaldire);
            return this.totaldire/5;
        }
    }
}
</script>


