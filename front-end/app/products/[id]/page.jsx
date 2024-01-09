import ImagePreview from "@/components/shared/ImagePreview";
import ProductColors from "@/components/shared/ProductColors";
import ProductDetails from "@/components/shared/ProductDetails";
import ProductTotal from "@/components/shared/ProductTotal";
import { getProducts } from "@/lib/action/product.action";
import Image from "next/image";
import React from "react";

const Page = async ({ params }) => {
  const products = await getProducts();

  const currentProduct = products?.data.filter(
    (product) => product.id === parseInt(params.id)
  );
  console.log(currentProduct);

  return (
    <>
      <div className="flex flex-col gap-10 lg:flex-row">
        {" "}
        <div className="relative mt-5 overflow-hidden ">
          <Image
            className="h-[700px] w-full object-cover"
            alt="product"
            src={currentProduct[0].image}
            width={700}
            height={700}
          />
          <ProductColors />
          <ImagePreview />
        </div>
        <div>
          <ProductDetails
            name={currentProduct[0].name}
            description={currentProduct[0].description}
          />
          <ProductTotal price={currentProduct[0].price} />
        </div>
      </div>
    </>
  );
};

export default Page;
