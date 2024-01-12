import { ContentBreaker } from "@/components/shared/Breaker";
import ProductCard from "@/components/shared/card/ProductCard";
import ProductGrid from "@/components/shared/grid/ProductGrid";
import { Button } from "@/components/ui/button";
import { ChevronLeft, ChevronRight } from "lucide-react";
import React from "react";

const PopularProduct = () => {
  return (
    <>
      <div className="flex_between">
        <p className="text-xl font-semibold">
          Phổ biến{" "}
          <span className="text_tertiary ml-3 text-xs uppercase">shop</span>
        </p>
        <div className="flex_start">
          <Button className="background_primary" variant="icon" size="icon">
            <ChevronLeft className="text_primary" />
          </Button>
          <Button className="background_primary" variant="icon" size="icon">
            <ChevronRight className="text_primary" />
          </Button>
        </div>
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

export default PopularProduct;
