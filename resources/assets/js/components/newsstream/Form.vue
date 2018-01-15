<template>
    <form>
        <div class="col-md-12">
            <form :method="method" :action="action">

                <md-field>
                    <label>Status</label>
                    <md-input v-model="el.status" required></md-input>
                    <span v-if="errors['status'] !== undefined" v-for="(error, index) in errors['status']" class="md-error" :key="index">{{error}}</span>
                </md-field>

                <md-field>
                    <label>Titel</label>
                    <md-input v-model="el.title" required></md-input>
                    <span v-if="errors['title'] !== undefined" v-for="(error, index) in errors['title']" class="md-error" :key="index">{{error}}</span>
                </md-field>

                <md-field>
                    <label>Subtitle</label>
                    <md-input v-model="el.subtitle"></md-input>
                    <span v-if="errors['subtitle'] !== undefined" v-for="(error, index) in errors['subtitle']" class="md-error" :key="index">{{error}}</span>
                </md-field>

                <md-field>
                    <label>Teaser</label>
                    <md-input v-model="el.teaser" required></md-input>
                    <span v-if="errors['teaser'] !== undefined" v-for="(error, index) in errors['teaser']" class="md-error" :key="index">{{error}}</span>
                </md-field>

                <md-field>
                    <quill-editor v-model="el.content"
                                  ref="myQuillEditor"
                                  :options="editorOption">
                    </quill-editor>
                    <span v-if="errors['content'] !== undefined" v-for="(error, index) in errors['content']" class="md-error" :key="index">{{error}}</span>
                </md-field>

                <md-button @click="onFormSubmit()" md-theme="button" class="md-raised md-primary">
                    Speichern
                </md-button>

            </form>
        </div>
    </form>
</template>

<script>
    export default {
        props: [
            'method',
            'action',
            'model'
        ],
        data() {
            return {
                el: this.model,
                errors: [],
                editorOption: {
                    // some quill options
                }
            }

        },

        created() {

        },

        watch: {},

        methods: {
            onFormSubmit() {
                axios({
                    method: this.method,
                    url: this.action,
                    data: this.el
                }).then((response) => {
                    // success
                    this.errors = []

                    if (this.method === 'POST') {
                        this.$emit('create', response.data)
                    }

                    if (this.method === 'PUT') {
                        this.$emit('update', response.data)
                    }

                })
                    .catch((error) => {
                        let response = error.response
                        this.errors = response.data.errors
                    })
            }
        }
    }
</script>

<style>

</style>