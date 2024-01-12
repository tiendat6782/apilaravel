import React from "react";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { badgeVariants } from "@/components/ui/badge";
import Link from "next/link";
import { ContentBreaker } from "./Breaker";

const ProductDetails = ({name,description}) => {
  return (
    <>
      <Tabs defaultValue="detail" className="mt-10 ">
        <TabsList className="flex items-center justify-center">
          <TabsTrigger value="detail">Chi tiết</TabsTrigger>
          <TabsTrigger value="feedback">Đánh giá</TabsTrigger>
        </TabsList>
        <div className="max-w-md">
          <TabsContent value="detail">
            <div className="flex w-full flex-col items-start">
              <p className="text-lg font-semibold text-primary">{name}</p>
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
               {description}
              </p>
            </div>
          </TabsContent>
          <TabsContent value="feedback">
            {" "}
            <p className="text-xs">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ad alias
              consequatur molestias debitis soluta mollitia itaque, perferendis
              laboriosam et autem iusto ipsa nobis quam cum molestiae at ipsum vitae
              inventore!.
            </p>
          </TabsContent>
        </div>
      </Tabs>
    </>
  );
};

export default ProductDetails;
