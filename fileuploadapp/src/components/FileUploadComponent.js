import React, { Component } from 'react';
import axios from 'axios';

export default class FileUploadComponent extends Component
{
   constructor(props) {
      super(props);
      this.state ={
        image: ''
      }
      this.onFormSubmit = this.onFormSubmit.bind(this)
      this.onChange = this.onChange.bind(this)
      this.fileUpload = this.fileUpload.bind(this)
    }
    onFormSubmit(e){
      e.preventDefault() 
      this.fileUpload(this.state.image);
    }
    onChange(e) {
    /*   let files = e.target.files || e.dataTransfer.files;
      if (!files.length)
            return; */
          
      this.setState({ image: e.target.files })
      let fd = new FormData()
      fd.append("images", "this.state.image");
      console.log(fd);                                          // Paprastai išlogint neišeis, kažkas nesueina, reikia ciklo.
     // this.createImage(files[0]);
    }
/*     createImage(file) {
      let reader = new FormData();
      reader.onload = (e) => {
        this.setState({
          image: e.target.result
        })
      };
      reader.readAsDataURL(file);
    } */

    fileUpload(){
      const url = 'http://localhost/api/fileupload';
      // const formData = {file: this.state.image}
      // return post(url, formData)
      //  .then(response => console.log(response))
      axios.post(url, {
        data: this.state.image
      })
      console.log("This is fileUpload");
      console.log(this.state.image);
    }
  
   render()
   {
      return(

         <form method="post" name="image" encType="multipart/form-data" onSubmit={this.onFormSubmit}>
        <h1>React js Laravel File Upload Tutorial</h1>
        <input type="file" onChange={this.onChange} />
        <button type="submit">Upload</button>
      </form>
      )
   }
}