"use server";

import { revalidatePath } from "next/cache";

export async function createUser(params) {
  const { email, username, password } = params;
  const res = await fetch("http://127.0.0.1:8000/api/register", {
    method: "POST",
    body: JSON.stringify({
      email,
      name: username,
      password,
    }),
    headers: {
      "Content-type": "application/json",
    },
  });
  const data = await res.json();
  console.log(data);
  revalidatePath("/");
  
}
