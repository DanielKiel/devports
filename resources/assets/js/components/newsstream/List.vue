<template>
    <div>
        <md-card md-theme="news" class="cont"  v-for="(news, index) in data.data" :key="index">
            <md-ripple>
                <md-card-header>
                    <div class="md-subtitle port">
                        dk@devports:8080 ~master php news: <span class="port-title">{{news.title}}</span>
                    </div>
                </md-card-header>

                <md-card-content>
                    {{news.teaser}}
                </md-card-content>

                <md-card-actions md-alignment="left">
                    <md-button>Weiterlesen ...</md-button>
                </md-card-actions>

            </md-ripple>
        </md-card>
    </div>
</template>
<script>
    export default {
        props: [
            'api',
        ],
        data() {
            return {
                news: [],
                data: {}
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
                    url: this.api,
                    params: {
                        published: 1
                    }
                }).then(response => {
                    this.data = response.data

                }).catch(err => {
                    console.log(err)
                })
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