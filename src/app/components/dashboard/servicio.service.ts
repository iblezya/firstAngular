import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ServicioService {
  URL = 'http://localhost:8100/angular/api/';

  constructor(private http: HttpClient) {}

  createProductos(producto){
    return this.http.post(`${this.URL}create.php`,JSON.stringify(producto));
  }

  readProductos(){
    return this.http.get(`${this.URL}read.php`);
  }

  updateProductos(producto2){
    return this.http.post(`${this.URL}update.php`, JSON.stringify(producto2));
  }

  deleteProductos(codigo: number){
    return this.http.get(`${this.URL}delete.php?codigo=${codigo}`);
  }

  selectProductos(codigo: number){
    return this.http.get(`${this.URL}select.php?codigo=${codigo}`)
  }
}
