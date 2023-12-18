import Image from "next/image";
import React from "react";
import { ContentBreaker } from "../Breaker";
import { Button } from "@/components/ui/button";
import { Heart } from "lucide-react";

const ProductCard = () => {
  return (
    <div>
      <Image
        alt="product image"
        src="https://images.unsplash.com/photo-1603808033192-082d6919d3e1?q=80&w=1315&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        width={400}
        height={400}
        className="h-48 w-full rounded-md object-cover object-center"
      />
      <ContentBreaker />
      <div className="flex_between">
        <p className="text_primary text-sm font-semibold">Product name</p>
        <Button variant="icon" size="icon" className="background_primary">
          <Heart className="text_primary w-5" />
        </Button>
      </div>
      <p className="text_secondary text-sm font-semibold">155.000 vnđ</p>
    </div>
  );
};

export default ProductCard;
