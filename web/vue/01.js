const app = new Vue({
    el: '#app',
    data: {
        title: 'Studients of Curse 1',
        students: [
            {name:'Peter', score:4, age:14},
            {name:'Jhon', score:4.5, age:15},
            {name:'Alex', score:3, age:14},
            {name:'Jimmy', score:3.2, age:15},
            {name:'Alison', score:1.5, age:14},
            {name:'Katie', score:1.8, age:15},
            {name:'Rachel', score:5.2, age:14}
        ],
        newStudentName: '',
        newStudentScore: null,
        newStudentAge: ''
    },
    methods:{
        addStudent () {
            this.students.push({
                name:this.newStudentName,
                score:this.newStudentScore,
                age:this.newStudentAge
            })
        }
    }
})