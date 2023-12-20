import PerspectiveCard from "@/components/shared/card/PerspectiveCard";
import React from "react";

const Page = () => {
  return (
    <div>
      <p className="text_primary text-center text-3xl font-semibold">
        Ruby Store cung cấp những sản phẩm gỉ?
      </p>
      <PerspectiveCard />
      <div className="">
        <p className="text_primary text-3xl font-semibold">
          Chúng tôi mang lại trải nghiệm mua sắm tốt nhất cho bạn.
        </p>
        <p className="text_primary text-sm font-normal">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora vel
          beatae esse, quidem pariatur fugit quam accusamus excepturi quia
          distinctio.
        </p>
      </div>
    </div>
  );
};

export default Page;
