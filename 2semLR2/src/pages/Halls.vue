<template>
    <div>
        <v-container>

            <v-data-table
                    :headers="headers"
                    :items="$store.getters.getAllHalls"
                    :hide-default-footer="true"
                    class="elevation-1 mt-8"
            >
                <template v-slot:top>
                    <v-toolbar
                            flat
                    >
                        <v-toolbar-title>Список залов</v-toolbar-title>

                        <v-divider
                                class="mx-4"
                                inset
                                vertical
                        ></v-divider>
                        <v-spacer></v-spacer>
                        <v-dialog
                                v-model="dialog"
                                max-width="500px"
                        >
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                        color="primary"
                                        dark
                                        class="mb-2"
                                        v-bind="attrs"
                                        v-on="on"
                                >
                                    Добавить
                                </v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="text-h5">{{ formTitle }}</span>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col
                                                    cols="12"
                                                    sm="6"
                                                    md="4"
                                            >
                                                <v-text-field
                                                        v-model="editedItem.title"
                                                        label="Название"
                                                ></v-text-field>
                                            </v-col>

                                        </v-row>
                                    </v-container>
                                </v-card-text>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                            color="blue darken-1"
                                            text
                                            @click="close"
                                    >
                                        Отменить
                                    </v-btn>
                                    <v-btn
                                            color="blue darken-1"
                                            text
                                            @click="save"
                                    >
                                        Сохранить
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                        <v-dialog v-model="dialogDelete" max-width="590px">
                            <v-card>
                                <v-card-title class="text-h5">Если товары нужно перенести, выберите куда, если нет подтвердите удаление</v-card-title>
                                <v-col
                                        cols="12"
                                        sm="6"
                                >
                                    <v-select
                                            v-model="currentIndex"
                                            :items="main"
                                            color="blue"
                                            label="Зал"
                                            required

                                    ></v-select>
                                </v-col>
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn color="blue darken-1" text @click="closeDelete">Отмена</v-btn>
                                    <v-btn color="blue darken-1" text @click="deleteItemConfirm">OK</v-btn>
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
                <template v-slot:item.actions="{ item }">
                    <v-icon
                            small
                            class="mr-2"
                            @click="editItem(item)"
                    >
                        mdi-pencil
                    </v-icon>
                    <v-icon
                            small
                            @click="deleteItem(item)"
                    >
                        mdi-delete
                    </v-icon>
                </template>
                <template v-slot:no-data>
                    <v-btn
                            color="primary"
                            @click="initialize"
                    >
                        Reset
                    </v-btn>
                </template>
            </v-data-table>

        </v-container>
    </div>
</template>

<script>
    import store from "@/store";

    export default {
        name: "Halls",
        data: () => ({
            dialog: false,
            dialogDelete: false,
            headers: [
                { text: 'Id', value: 'id' },
                { text: 'Название зала', value: 'title' },
                { text: 'Действия', value: 'actions', sortable: false }
            ],

            main: [],
            editedIndex: -1,
            editedItem: {
                id: Date.now(),
                title: ''
            },
            defaultItem: {
                id: Date.now(),
                title: ''
            },
            currentIndex: -1
        }),

        computed: {
            formTitle () {
                return this.editedIndex === -1 ? 'Новый элемент' : 'Изменить элемент'
            },
        },

        watch: {
            dialog (val) {
                val || this.close()
            },
            dialogDelete (val) {
                val || this.closeDelete()
            },
        },

        created () {
            this.initialize()
        },

        methods: {
            initialize () {

            },

            editItem (item) {
                this.editedIndex = store.getters.getAllHalls.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem (item) {
                let obj = this.$store.getters.getAllHalls
                this.editedIndex = obj.indexOf(item)
                this.editedItem = Object.assign({}, item)
                obj = obj.map(e => e.title).filter((e,index)=> index != this.editedIndex)

                this.main = obj
                this.dialogDelete = true
            },

            deleteItemConfirm () {
                if (this.currentIndex > -1){
                    this.$store.commit("reloadHallsElementPaintings",{newHall: this.currentIndex, oldHall: this.editedItem.title});
                    this.$store.commit("deleteElementHalls",this.editedIndex);
                }else{
                    this.$store.commit("deleteElementHalls",this.editedIndex);
                }

                this.closeDelete()
            },

            close () {
                this.dialog = false
                this.$nextTick(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                })
            },

            closeDelete () {
                this.dialogDelete = false
                this.$nextTick(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                    this.currentIndex = -1
                })

            },

            save () {
                if (this.editedIndex > -1) {
                    //Object.assign(this.main[this.editedIndex], this.editedItem)
                    this.$store.commit(
                        "editElementHalls",
                        {index: this.editedIndex, elem: this.editedItem}
                    );
                } else {
                    this.$store.commit("addElementHalls",this.editedItem);
                    //this.main.push(this.editedItem)
                }
                this.close()
            },
        }
    }
</script>

<style scoped>

</style>