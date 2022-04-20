export default {
    state: {
        paintings: [
            {
                id: 1,
                name: "Котики",
                des: "Красивые котики",
                year: 2014,
                hall: 'Пикассо',
                photo: 'https://kartinkin.net/uploads/posts/2022-02/1644894906_11-kartinkin-net-p-kartinki-kotyata-13.jpg',
            },
            {
                id: 2,
                name: "Лисичка",
                des: "Рыжая",
                year: 2004,
                hall: 'Волгоградские художники',
                photo: 'https://i.artfile.ru/3888x2592_665350_[www.ArtFile.ru].jpg',
            },
            {
                id: 3,
                name: "Собачка",
                des: "Вы могли подумать, что это козленок, но это собачка",
                year: 2010,
                hall: 'Пикассо',
                photo: 'https://ferret-pet.ru/wp-content/uploads/d/1/9/d19939e6e4ed6b94e6607959e939f45f.jpeg',
            }
        ]
    },
    getters: {
        getAllPaintings(state){
            return state.paintings
        }
    },
    mutations: {
        deleteElementPaintings(state,payload){
            state.paintings = state.paintings.filter( (e,i) => i != payload)
        },
        addElementPaintings(state,payload) {
            state.paintings.push(payload)
        },
        editElementPaintings(state,payload) {
            state.paintings = state.paintings.map( (e, i) => {
                if (i == payload.index) return payload.elem
                else  return e
            })
        },
        reloadHallsElementPaintings(state,payload){
            state.paintings = state.paintings.map( (e) => {
                if (e.hall == payload.oldHall) return  {
                    id: e.id,
                    name: e.name,
                    des: e.des,
                    year: e.year,
                    hall: payload.newHall,
                    photo: e.photo,
                }
                else return e
            })
        },
    },
    actions: {
    }
}