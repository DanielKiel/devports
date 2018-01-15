<template>
    <div>
        <div md-alignment="right" v-if="auth == 1">
            <md-button  @click="newForm = !newForm"> New Form</md-button>
            <newsstream-form v-if="newForm" :model="{}" method="POST" :action="api"  @create="onElementCreated"></newsstream-form>
        </div>
        <md-card  class="cont"  v-for="(news, index) in data.data" :key="index">
            <div md-alignment="right" v-if="auth == 1">
                <md-button v-if="edits[news.id] === false" @click="showForm(news.id, true)"> Edit</md-button>
                <md-button v-else @click="showForm(news.id, false)"> Quit</md-button>
            </div>

            <div v-if="edits[news.id] === false">
                <md-card-header>
                    <div class="md-subtitle port">
                        dk@devports:8080 ~master php news: <span class="port-title">{{news.title}}</span>
                    </div>
                </md-card-header>

                <md-card-content>
                    <div v-if="contents[news.id] === true">
                        <span v-html="news.content"></span>
                    </div>
                    <div v-else>
                        <span v-html="news.teaser"></span>
                    </div>

                </md-card-content>

                <md-card-actions md-alignment="left">
                    <md-button class="md-dense" v-if="contents[news.id] === false" @click="showContent(news.id, true)">php news:show_content</md-button>
                    <md-button class="md-dense" v-else @click="showContent(news.id, false)">php news:hide_content</md-button>
                </md-card-actions>

            </div>
            <div v-else>
                <newsstream-form :model="news" method="PUT" :action="api + '/' + news.id"></newsstream-form>
            </div>
        </md-card>
    </div>
</template>
<script>
    Vue.component('newsstream-form', require('./Form.vue'));

    export default {
        props: [
            'api',
            'auth'
        ],
        data() {
            return {
                news: [],
                data: {},
                contents: [],
                edits: [],
                newForm: false
            }

        },

        created() {
            this.getData()

        },

        watch: {},

        methods: {
            getData() {
                axios({
                    method: 'GET',
                    url: this.api
                }).then(response => {
                    this.data = response.data

                    this.data.data.forEach( news => {
                        this.contents[news.id] = false
                        this.edits[news.id] = false
                    })

                }).catch(err => {
                    console.log(err)
                })
            },

            showContent(id, state) {
                Vue.set(this.contents, id,  state)
            },

            showForm(id, state) {
                Vue.set(this.edits, id,  state)
            },

            onElementCreated() {
                this.getData()
            }
        }
    }
</script>

<style>
    .cont {
        margin-bottom: 10px;
    }

    .port-title {
        font-size: 1.1em;
        font-weight: bold;
    }
</style>