"use server";

export async function getProducts() {
  const products = await fetch("http://127.0.0.1:8000/api/product");
  const res = await products.json();

  return res;
}
