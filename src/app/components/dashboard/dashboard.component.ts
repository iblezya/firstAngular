import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {



  constructor(private fb:FormBuilder) { }

  producto = this.fb.group({
    descripcion: ["", Validators.required],
    marca: ["", Validators.required],
    precio: ["", Validators.required],
    stock: ["", Validators.required]
  });
  ngOnInit(){
  }
  get f() { return this.producto.controls; }

  onSubmit() {
    console.log(this.producto.value);
    alert('Mensaje Enviado !'+JSON.stringify(this.producto.value));
    this.producto.reset();
  }
}
