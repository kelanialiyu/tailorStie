
// (()=>{

//     $("#shared_modal").on('show.bs.modal', function (event) {
//         let button = $(event.relatedTarget) // Button that triggered the modal
//         let id = button.data("id") // Extract info from data-* attributes
//         let msg = button.data("msg")
//         let modal_for = button.data("modal_for")
//         let title = button.data("title")
//         // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
//         // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//         var modal = $(this)
//         modal.find('.modal-title').text(title)
//         modal.find('.modal-body ._msg').text(`${msg}?`);
//         modal.find('.modal-footer form').attr("action",`/${modal_for}/${id}/`);

//     })

//     })()

// let btn = document.querySelector("button.btn-addSize");
// btn.addEventListener("click", e => {
//     let form = document.querySelector("form.form-addSize")
//     let form_size = form.querySelector("input#size")
//     let form_size_type = form.querySelector("input#size-type")
//     let form_unit = form.querySelector("select#unit")
//     let form_customer_id = form.querySelector("input#customer_id")
//     let size = form_size.value
//     let size_type = form_size_type.value
//     let unit = form_unit.value
//     let customer_id = form_customer_id.value

//     fetch("http://tailorsite.prod/api/customer/size/"+customer_id,
//     {
//         method:"POST",
//         headers:{
//             "Content-Type":"application/json",
//             "Accept":"application/json"
//         },
//         body:JSON.stringify({
//             name:size_type,
//             unit:unit,
//             size:size
//         })
//     })
//     .then(result => result.json())

//     .then(data => {
//         if(data.errors){
//             console.error("Error =>",data)
//         }
//         else{
//             let div = document.createElement("div")
//             div.style.backgroundColor = "rgba(23, 196, 8, 0.575) !important"
//             div.innerHTML = addSize(data.data)
//             document.querySelector(".sizes").prepend(div)
//             $('#sizeAddModal').modal('hide')
//             form_size.value=""
//             form_unit.value=""
//             form_size_type.value=""
//             div.tabIndex = 1;
//             div.focus()
//         }

//     })
// })
// const addSize =({id,size,unit,type}) =>`
// <div class="row size bg-light align-items-center my-1">
// <div class="col-sm-5"><span class="text-capitalize">${type}</span></div>
// <div class="col-sm-3"><span class="text-lowercase">${size} ${unit}</span></div>
// <div class="col-sm-4 d-flex justify-content-end">
//     <button class="btn text-danger mx-1 "><i class="fa fa-trash align-top"></i></button>
//     <button class="btn text-info mx-1 " data-toggle="modal" data-target="#sizeEditModal" data-name="${type}" data-cid="${id}"><i class="fa fa-edit align-top"></i></button>
// </div>
// </div>
// `

// // console.log(addSize(1,2,3,4))
