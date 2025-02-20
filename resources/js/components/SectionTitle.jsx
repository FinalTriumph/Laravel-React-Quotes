import React from 'react';

export default function SectionTitle({ title }) {
    if (!title) {
        return (null);
    }

    return (
        <div className="px-10 py-4 mb-4 bg-custom-primary-1 shadow rounded-lg border-b-2 border-custom-neutral-1">
            <p className="font-bold text-lg text-custom-neutral-1">{title}</p>
        </div>
    );
}