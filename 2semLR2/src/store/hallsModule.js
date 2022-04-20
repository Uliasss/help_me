export default {
    state: {
        halls: [
            {
                id: 1,
                title: "Волгоградские художники"
            },
            {
                id: 2,
                title: "Пикассо"
            },
            {
                id: 3,
                title: "20 век"
            }
        ]
    },
    getters: {
        getAllHalls(state){
            return state.halls
        },
        getAllNameHalls(state){
            return state.halls.map( e => e.title )
        }
    },
    mutations: {
        deleteElementHalls(state,payload){
            state.halls = state.halls.filter( (e,i) => i != payload)
        },
        addElementHalls(state,payload) {
            state.halls.push(payload)
        },
        editElementHalls(state,payload) {
            state.halls = state.halls.map( (e, i) => {
                if (i == payload.index) return payload.elem
                else  return e
            })
        }
    },
    actions: {
    }
}