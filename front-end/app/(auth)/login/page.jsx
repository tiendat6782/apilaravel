"use client";
import { Button } from "@/components/ui/button";
import Image from "next/image";
import Link from "next/link";
import React from "react";
import { useForm } from "react-hook-form";

const Page = () => {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();
  const onSubmit = (data) => console.log(data);
  return (
    <div className="flex h-screen w-screen items-center justify-center">
      <div className="w-full max-w-[400px]">
        <div className="flex_between">
          <Image
            src={"/assets/logos/logo.png"}
            width={300}
            height={300}
            className="h-full w-48 "
            alt="logo"
          />
          <p className="text_primary text-xl font-semibold">Đăng nhập</p>
        </div>
        <form onSubmit={handleSubmit(onSubmit)} className="mt-5">
          <div className="flex flex-col space-y-2">
            <input
              type="text"
              placeholder="Tên đăng nhập"
              className="border_primary rounded-lg border p-2"
              {...register("username", { required: true })}
            />
            {errors.username && <span>This field is required</span>}
            <input
              type="password"
              placeholder="Mật khẩu"
              className="border_primary rounded-lg border p-2"
              {...register("password", { required: true })}
            />
            {errors.password && <span>This field is required</span>}
            <Button className="" type="submit">
              Đăng nhập
            </Button>
          </div>
          <p className="mt-3">
            Chưa có tài khoản?{" "}
            <Link href="/register" className="underline">
              Đăng ký
            </Link>
          </p>
        </form>
      </div>
    </div>
  );
};

export default Page;
