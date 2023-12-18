import ImagePreview from "@/components/shared/ImagePreview";
import ProductColors from "@/components/shared/ProductColors";
import ProductDetails from "@/components/shared/ProductDetails";
import ProductTotal from "@/components/shared/ProductTotal";
import Image from "next/image";
import React from "react";

const Page = () => {
  return (
    <>
      <div className="relative mt-5 overflow-hidden">
        <Image
          className="h-[700px] w-full object-cover"
          alt="product"
          src="https://images.unsplash.com/photo-1605348532760-6753d2c43329?q=80&w=1287&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          width={700}
          height={700}
        />
        <ProductColors />
        <ImagePreview />
      </div>
      <ProductDetails />
      <ProductTotal />
    </>
  );
};

export default Page;
