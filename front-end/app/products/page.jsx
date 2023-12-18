import { ContentBreaker } from "@/components/shared/Breaker";
import ProductCard from "@/components/shared/card/ProductCard";
import ProductGrid from "@/components/shared/grid/ProductGrid";
import Filters from "@/components/shared/search/FIlters";
import GlobalFilters from "@/components/shared/search/GlobalFilters";
import React from "react";

const Page = () => {
  return (
    <>
      <GlobalFilters />
      <div className="flex_between border_b_primary relative gap-2">
        <Filters />
        <p className="text_secondary text-xs font-semibold">
          Tìm thấy <span className="text-primary">20</span> sản phẩm
        </p>
      </div>
      <ContentBreaker />
      <ProductGrid>
        <ProductCard imgSrc="https://images.unsplash.com/photo-1603808033192-082d6919d3e1?q=80&w=1315&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
        <ProductCard imgSrc="https://images.unsplash.com/photo-1605348532760-6753d2c43329?q=80&w=1287&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
        <ProductCard imgSrc="https://images.unsplash.com/photo-1608231387042-66d1773070a5?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
      </ProductGrid>
    </>
  );
};

export default Page;
