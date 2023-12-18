import React from "react";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { badgeVariants } from "@/components/ui/badge";
import Link from "next/link";
import { ContentBreaker } from "./Breaker";

const ProductDetails = () => {
  return (
    <>
      <Tabs defaultValue="account" className="mt-10 ">
        <TabsList className="flex items-center justify-center">
          <TabsTrigger value="account">Chi tiết</TabsTrigger>
          <TabsTrigger value="password">Đánh giá</TabsTrigger>
        </TabsList>
        <TabsContent value="account">
          <div className="flex w-full flex-col items-start">
            <p className="text-lg font-semibold text-primary">Tên sản phẩm</p>
            <div className="flex_start mt-1">
              <Link
                href="/product"
                className={badgeVariants({ variant: "default" })}
              >
                Best seller
              </Link>
              <Link
                href="/product"
                className={badgeVariants({ variant: "default" })}
              >
                Most viewed
              </Link>
            </div>
            <ContentBreaker />
            <p className="text-xs ">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad alias
              consequatur molestias debitis soluta mollitia itaque, perferendis
              laboriosam et autem iusto ipsa nobis quam cum molestiae at ipsum
              vitae inventore!
            </p>
          </div>
        </TabsContent>
        <TabsContent value="password">
          {" "}
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad alias
          consequatur molestias debitis soluta mollitia itaque, perferendis
          laboriosam et autem iusto ipsa nobis quam cum molestiae at ipsum vitae
          inventore!.
        </TabsContent>
      </Tabs>
    </>
  );
};

export default ProductDetails;
