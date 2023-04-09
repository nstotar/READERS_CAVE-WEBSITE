const icons = document.querySelectorAll(`li`)
const i = document.querySelectorAll(`bx`)

const a = []

icons.forEach(li => {
    li.addEventListener(`click` , () =>{

        // setting default for before a click
        setDef()
        // adding class to add the click marker 
        li.classList.add(`activeElement`)
        // removing the list item css
        li.classList.remove(`li-item`)
        // li.classList.remove(`each-item`)        
    })
})


function setDef(){
    icons.forEach(l => {
        // adding class to remove the click marker 
        l.classList.remove(`activeElement`)
        // adding the list item css
        l.classList.add(`li-item`)
    })
}
