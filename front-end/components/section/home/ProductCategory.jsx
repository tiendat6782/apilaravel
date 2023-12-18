import ImageCard from "@/components/shared/card/ImageCard";
import React from "react";

const ProductCategory = () => {
  return (
    <div className="w-full">
      <div className="grid grid-cols-2 gap-1">
        <ImageCard imgSrc="https://images.unsplash.com/photo-1560769629-975ec94e6a86?q=80&w=1528&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
        <ImageCard imgSrc="https://images.unsplash.com/photo-1543508282-6319a3e2621f?q=80&w=1315&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
        <ImageCard
          imgSrc="https://images.unsplash.com/photo-1543508282-6319a3e2621f?q=80&w=1315&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
          extraClass="col-span-2"
        />
      </div>
    </div>
  );
};

export default ProductCategory;
