import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { HttpClient } from '@angular/common/http';
import { ServicioService } from './servicio.service';
import Swal from 'sweetalert2';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  productos = null;
  producto: FormGroup;
  producto2 = {
    descripcion: null,
    marca: null,
    precio: null,
    stock: null,
  }

  constructor(private fb: FormBuilder, private servicioFormulario: ServicioService, private http: HttpClient) { }

  ngOnInit() {
    this.readProductos();

    this.producto = this.fb.group({
      descripcion: ["", Validators.required],
      marca: ["", Validators.required],
      precio: ["", Validators.required],
      stock: ["", Validators.required]
    });
  }

  get f() { return this.producto.controls; }

  Guardar() {
    this.createProductos();
    this.producto.reset();

  }
  Editar() {
    this.updateProductos();
    this.producto.reset();
    this.readProductos();
  }

  createProductos() {
    this.servicioFormulario.createProductos(this.producto.value).subscribe(
      datos => {
        if (this.producto != null) {

          Swal.fire({
            title: 'Registrado',
            text: 'Se registro exitosamente',
            icon: 'success'
          });
          this.readProductos();
        }
      });
  }

  readProductos() {
    this.servicioFormulario.readProductos().subscribe(
      resultado => this.productos = resultado
    );
  }

  updateProductos() {
    this.servicioFormulario.updateProductos(this.producto2).subscribe(
      datos => {
        if (this.producto != null) {

          Swal.fire({
            title: 'Modificado',
            text: 'Se modifico exitosamente',
            icon: 'success',
          });
          this.readProductos();
        }
      });
  }

  deleteProductos(codigo) {
    this.servicioFormulario.deleteProductos(codigo).subscribe(
      ddatos => {
        if (this.producto != null) {

          Swal.fire({
            title: 'Eliminado',
            text: 'Se elimino exitosamente',
            icon: 'warning',
          });
          this.readProductos();
        }
      });
  }

  selectProductos(codigo) {
    this.servicioFormulario.selectProductos(codigo).subscribe(
      resultado => this.producto2 = resultado[0]
    );
  }

  listProductos() {
    if (this.productos == null) {
      return false;
    } else {
      return true;
    }
  }

}
