import Image from "next/image";
import React from "react";
import { ContentBreaker } from "../Breaker";
import { Button } from "@/components/ui/button";
import { Heart } from "lucide-react";
import Link from "next/link";

const ProductCard = ({ imgSrc, name,price,id }) => {
  return (
    <div className="border_primary">
      <Link href={`/products/${id}`}>
        <Image
          alt="product image"
          src={imgSrc}
          width={400}
          height={400}
          className="h-48 w-full  object-cover object-center"
        />
      </Link>
      <ContentBreaker />
      <div className="p-2">
        <div className="flex_between">
          <p className="text_primary text-sm font-semibold">{name}</p>
          <Button variant="icon" size="sm" className="background_primary">
            <Heart className="text_primary h-4 w-4" />
          </Button>
        </div>
        <p className="text_secondary text-sm font-semibold">{price} VNĐ</p>
      </div>
    </div>
  );
};

export default ProductCard;
